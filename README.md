# 🚀 **Registration Form Deployment using MySQL on EC2 (LEMP Stack)**


This project demonstrates the deployment of a user registration form integrated with a MySQL database, hosted on an AWS EC2 instance using the LEMP Stack (Linux, Nginx, MySQL, and PHP).

📌 Project Objectives

•Design and develop a user registration form

•Integrate form data with a MySQL database

•Deploy the application on an AWS EC2 instance

🧰 Prerequisites

•AWS account with EC2 access

•SSH key pair

•Basic terminal knowledge

•MySQL & PHP experience (optional)

🚀 Project Setup & Deployment Steps
Step 1: Launch an AWS EC2 Instance

Go to AWS Management Console → EC2
•Click Launch Instance

Configure:

•Enter name for instance

•AMI: Amazon Linux 2 (Free Tier eligible)
<img width="877" height="591" alt="img ami (1)" src="https://github.com/user-attachments/assets/6616faef-8e77-49bc-9133-b0a31515278f" />


•Instance type: t2.micro
<img width="890" height="593" alt="instance type" src="https://github.com/user-attachments/assets/365339c0-21bb-4fd0-9836-231cc8929243" />


•Key pair: Create/use existing

•Security group: Allow 22 (SSH) and 80 (HTTP)

•Click Launch Instance

<img width="1366" height="603" alt="Screenshot (37)" src="https://github.com/user-attachments/assets/ae666898-6555-4dd2-8f02-6efe594115bd" />



Step 2: SSH into EC2 Instance
```bash
ssh -i "your-key.pem" ec2-user@your-public-ip
```




Step 3: Setup LEMP Environment
Install Nginx, PHP, MySQL:
```bash
sudo yum install nginx php mariadb105-server -y
```

Start & enable services:
```bash
sudo service nginx start
sudo systemctl enable nginx
```

```bash
sudo service php-fpm start
sudo systemctl enable php-fpm
```

```bash
sudo service mariadb start
sudo systemctl enable mariadb
```

Step 4: Create the HTML Signup Form
sudo nano /usr/share/nginx/html/index.html


•Paste your index.html


Step 5: Create the PHP Script (register.php)
sudo nano /usr/share/nginx/html/register.php


Paste your register.php 


Step 6: Setup the MySQL Database

Login:

```bash
sudo mysql -u root -p
```


Set root password:

```bash
ALTER USER 'root'@'localhost' IDENTIFIED BY 'your_root_password';
```


Create database & table:

```bash
CREATE DATABASE registration_db;
USE registration_db;

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  email VARCHAR(100),
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Step 7: Install MySQL PHP Extension
```bash
sudo yum install php8.4-mysqlnd.x86_64 -y
```

Step 8: Reload Services
```bash
sudo service nginx reload
sudo service php-fpm reload
sudo service mariadb reload
```

Final Output

Open in browser:

```bash
http://your-ec2-public-ip
```

📸 index.html Output

<img width="1344" height="768" alt="Screenshot (38)" src="https://github.com/user-attachments/assets/98ae85f0-8d2f-4e7f-8f17-a8eeec4d0003" />


📸 register.php Output

![Screenshot (39)](https://github.com/user-attachments/assets/92aadee5-bec9-46e5-a8d9-dbf84fb9f52d)


📸 Database Records Screenshot

<img width="2048" height="512" alt="Screenshot (40)" src="https://github.com/user-attachments/assets/a98ab467-7964-4691-bc13-c990c99519c8" />


🏁 Conclusion

This project demonstrates how to build and deploy a fully functional User Registration System on AWS EC2 using the LEMP Stack
