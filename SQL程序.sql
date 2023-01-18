-- Active: 1669556043900@@127.0.0.1@3306@waimaidb
/* Trigger */
delimiter $$
CREATE TRIGGER `alert_trigger` AFTER UPDATE ON `rider` FOR EACH ROW 
BEGIN
  IF NEW.pcr = 'POSITIVE' OR NEW.temp > 37.3 THEN
    INSERT INTO alert_table (rider_id, alert_type, alert_time)
    VALUES (NEW.rider_id, 'You are under high danger of COVID-19 Infection, Please Complete 5tian 3jian!', NOW());
  END IF;
   IF NEW.pcr = 'NEGATIVE' AND NEW.temp < 37.3 THEN
    UPDATE alert_table SET resolved = 1 WHERE rider_id = NEW.rider_id AND resolved = 0;
  END IF;
END $$

/*Privileges*/
DROP USER IF EXISTS 'customer'@'localhost';
DROP USER IF EXISTS 'rider'@'localhost';
DROP USER IF EXISTS 'dba'@'localhost';
DROP USER IF EXISTS 'merchant'@'localhost';
FLUSH PRIVILEGES;

CREATE USER 'dba'@'localhost' identified by 'dba';
CREATE USER 'rider'@'localhost' identified by 'rider';
CREATE USER 'merchant'@'localhost' identified by 'merchant';
CREATE USER 'customer'@'localhost' identified by 'customer';

GRANT SELECT, INSERT, UPDATE, DELETE ON `waimaidb`.`cart` TO `customer`@`localhost`;
GRANT SELECT, INSERT, UPDATE (`delivery_addr`, `email`, `password`, `phone`) ON `waimaidb`.`customer` TO `customer`@`localhost`;
GRANT SELECT, UPDATE (`ordered_count`) ON `waimaidb`.`food` TO `customer`@`localhost`;
GRANT SELECT (`username`), INSERT, UPDATE (`password`) ON `waimaidb`.`login` TO `customer`@`localhost`;
GRANT SELECT ON `waimaidb`.`merchant` TO `customer`@`localhost`;
GRANT SELECT, INSERT, UPDATE ON `waimaidb`.`order_menu` TO `customer`@`localhost`;
GRANT SELECT, INSERT, UPDATE, UPDATE (`order_status`, `ordermenu_id`) ON `waimaidb`.`orders` TO `customer`@`localhost`;
GRANT SELECT ON `waimaidb`.`rider` TO `customer`@`localhost`;

GRANT SELECT (`username`), INSERT, UPDATE (`password`) ON `waimaidb`.`login` TO `merchant`@`localhost`;
GRANT SELECT, INSERT, UPDATE, DELETE ON `waimaidb`.`food` TO `merchant`@`localhost`;
GRANT SELECT (`username`), INSERT, UPDATE (`password`) ON `waimaidb`.`login` TO `merchant`@`localhost`;
GRANT SELECT, INSERT, INSERT (`area`), UPDATE (`area`, `area_id`, `delivery_coverage`, `is_open`, `menu_id`, `merchant_addr`, `merchant_name`, `password`, `phone`) ON `waimaidb`.`merchant` TO `merchant`@`localhost`;
GRANT SELECT ON `waimaidb`.`order_menu` TO `merchant`@`localhost`;
GRANT SELECT, UPDATE ON `waimaidb`.`orders` TO `merchant`@`localhost`;

GRANT SELECT, UPDATE ON `waimaidb`.`alert_table` TO `rider`@`localhost`;
GRANT SELECT, INSERT, UPDATE (`password`) ON `waimaidb`.`login` TO `rider`@`localhost`;
GRANT SELECT ON `waimaidb`.`order_menu` TO `rider`@`localhost`;
GRANT SELECT, UPDATE, UPDATE (`updated_at`) ON `waimaidb`.`orders` TO `rider`@`localhost`;
GRANT SELECT, INSERT, UPDATE (`phone`,`homeAddr`, `temp`, `pcr`, `password`, `pcr_time`, `service_status`) ON `waimaidb`.`rider` TO `rider`@`localhost`;

GRANT ALL PRIVILEGES ON `waimaidb`.* TO `dba`@`localhost`;



/*6个 SQL查询*/
/*
1. 找出2021年1月1日之后点餐次数前十的顾客, 按照点餐次数进行降序排序; 若次数相同, 则按照顾客姓名拼音次序排序
*/
create temporary table customer_record_num as(
	select customer_id, count(*) as record_num
	from orders
	where date(order_time) >= '2021-1-1' and order_status != 'CANCELED'
	group by customer_id);
select name, record_num
	from customer natural join customer_record_num
	order by record_num desc, name asc
limit 10;

/*
2. 查找顾客消费次数最多的商家的信息，包括商家的名称、顾客消费次数，顾客消费次数相同的按照订单总额排序
*/
SELECT a.merchant_name AS merchant_name, a.merchant_id AS merch, b.order_num AS order_num, b.total_amt AS total_amt
FROM (
  SELECT merchant_id, merchant_name
  FROM merchant
) AS a
NATURAL JOIN (
  SELECT merchant_id, COUNT(*) AS order_num, SUM(total_price) AS total_amt
  FROM orders WHERE order_status != 'CANCELED'
  GROUP BY merchant_id
) AS b
WHERE b.order_num = (
  SELECT MAX(order_num)
  FROM (
    SELECT COUNT(*) AS order_num
    FROM orders WHERE order_status != 'CANCELED'
    GROUP BY merchant_id
  ) AS c
)
ORDER BY order_num DESC, total_amt DESC;

/*
3. 找出在30天内顾客消费次数少于全部商家平均接待次数的商家姓名, 编号
*/
SELECT m.merchant_id, m.merchant_name, IFNULL(num_orders, 0) as num_ord
FROM merchant m
LEFT JOIN (SELECT o.merchant_id, COUNT(*) as num_orders
           FROM orders o
           WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED'
           GROUP BY o.merchant_id) temp ON temp.merchant_id = m.merchant_id
WHERE COALESCE(temp.num_orders, 0) < (SELECT AVG(COALESCE(temp2.num_orders, 0)) FROM
    (SELECT o.merchant_id, COUNT(*) as num_orders
     FROM orders o
     WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED'
     GROUP BY o.merchant_id
     UNION ALL
     SELECT m.merchant_id, 0 as num_orders
     FROM merchant m
     WHERE m.merchant_id NOT IN (SELECT o.merchant_id FROM orders o 
     WHERE o.order_time >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND o.order_status != 'CANCELED')) temp2);

/*
4. 找出在14天内体温高于37.3度的配送员所接触过的商家和顾客的姓名、地址
*/
SELECT c.name as name, c.delivery_addr as addr
FROM customer c
JOIN `orders` o ON c.customer_id = o.customer_id
JOIN rider r ON o.rider_id = r.rider_id
WHERE r.temp > 37.3 AND o.order_time >= DATE_SUB(CURDATE(), INTERVAL 14 DAY);

/*
5. 找出在7天内的所有订单中, 消费总额最少的菜品名称, 若存在多种菜品的总额相同且最少, 则都列出
*/
SELECT f.food_name as food_name, 
SUM(CASE WHEN o.order_status != 'CANCELED' THEN om.food_price * om.quantity ELSE 0 END) as total_revenue
FROM food f
LEFT JOIN order_menu om ON f.food_name = om.food_name
LEFT JOIN orders o ON om.order_id = o.order_id AND o.order_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
GROUP BY f.food_name
HAVING total_revenue = (SELECT MIN(total_revenue) 
FROM (SELECT SUM(CASE WHEN o.order_status != 'CANCELED' THEN om.food_price * om.quantity ELSE 0 END) as total_revenue
FROM food f LEFT JOIN order_menu om ON f.food_name = om.food_name LEFT JOIN orders o 
ON om.order_id = o.order_id AND o.order_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
GROUP BY f.food_name) as min_revenue_foods);

/*
6. 找出在30天内订单异常次数(系统中存在顾客有效订单,但是超过2小时没有到达订单完成状态)超过2次的顾客的姓名和配送员姓名
*/
SELECT c.name AS customer_name, r.rider_name as rider_name, COUNT(*) as cnt
FROM orders o
JOIN customer c ON c.customer_id = o.customer_id
JOIN rider r ON r.rider_id = o.rider_id
WHERE o.order_status = 'DONE'
  AND o.updated_at > DATE_SUB(NOW(), INTERVAL 30 DAY)
  AND TIMESTAMPDIFF(HOUR, o.order_time, o.updated_at) > 2
GROUP BY o.customer_id
HAVING COUNT(*) > 2;