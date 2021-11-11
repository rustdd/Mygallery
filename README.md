

https://user-images.githubusercontent.com/93055754/141301485-836315f1-2760-450c-b22c-b911d0cdc131.mp4

# Mygallery
simple site with login system where you can upload images after you sign in.
I know its so called spaghetti code so I will try to reorganize it later. also I will try to add delete image function and, also create profile for every user.

You need to install Xampp in your pc to run this project. after that you should create database mygallery on phpmyadmin.
than you have to run following sql codes:

CREATE TABLE `mygallery`.`users` ( `users_id` INT NOT NULL AUTO_INCREMENT , `users_uid` VARCHAR(255) NOT NULL , `users_pwd` VARCHAR(255) NOT NULL , `users_email` VARCHAR(255) NOT NULL , PRIMARY KEY (`users_id`)) ENGINE = InnoDB;

CREATE TABLE `mygallery`.`images` ( `image_id` INT NOT NULL AUTO_INCREMENT , `image_author` VARCHAR(255) NOT NULL , `description` VARCHAR(255) NOT NULL , `image` VARCHAR(255) NOT NULL , PRIMARY KEY (`image_id`)) ENGINE = InnoDB;

Video walkthrouugh on project


