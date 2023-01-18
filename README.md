# FoodOrderingSystem_DB

![alt text](https://github.com/timingsniper/FoodOrderingSystem_DB/blob/main/website.png)
![alt text](https://github.com/timingsniper/FoodOrderingSystem_DB/blob/main/E-R图.png)
 
This is a food ordering system created with MySQL and PHP for **数据库概论@Peking University** 2022-2023 1st Semester. Codes written by Percy Joonwoo Jang 张晙优.

本程序名称为“彬彬外卖平台”，是基于MySQL 8.0设计的数据库和PHP+Apache客户端方式的外卖管理系统程序。用户可以以客户，商户，骑手，管理员的身份注册并登录使用本系统。根据用户类别，用户可在本程序上使用的功能如下：

**1.	顾客**：顾客可以登录并修改自己的部分基本信息，查看现在营业中的商家列表并从商店选择菜品，加入到购物车。加入购物车后可以修改数量，确认信息后下单。下单后如果商家还没有接单，用户方可以取消订单。用户也可以查询自己的历史订单。

**2.	商家**：商家可以登录并修改商家部分基本信息，查询自己商家的菜单，增删菜品，查询菜品信息，销售量等。商家还可以查询用户给自己商家下的订单，并选择接单。

**3.	骑手**：骑手可以登录并修改骑手部分基本信息，如果核酸符合要求，可以接受商家已接的订单。之后可以更新订单状态为已取餐，配送中和订单完成。骑手也可以查询自己的历史订单。

**4.	管理员**：管理员拥有数据库所有权限，可在程序中对客户，商家，商家菜品，骑手进行增减（增加功能由于存在注册功能没放在管理员页面），对系统中的区域进行疫情信息调整。管理员也可以在页面进行各种查询。
