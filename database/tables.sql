CREATE TABLE `users` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `user_name` varchar(255) NOT NULL,
 `user_email` varchar(255) NOT NULL,
 `user_password` varchar(255) NOT NULL,
 `user_phone_number` varchar(10) NOT NULL,
 PRIMARY KEY (`user_id`)
);

CREATE TABLE `categories` (
 `category_id` int(11) NOT NULL,
 `category_name` varchar(255) NOT NULL,
 `user_category_id` int(255) NOT NULL,
 primary key(`category_id`)
);

CREATE TABLE `uploads` (
 `song_path_id` int(11) NOT NULL AUTO_INCREMENT,
 `song_path` varchar(255) NOT NULL,
 `song_name` varchar(255) NOT NULL,
 `category_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL
 PRIMARY KEY (`song_id`)
);

INSERT INTO `users` (`user_id`,`user_name`,`user_email`,`user_password`,`user_phone_number`) VALUES 
(1,'admin', 'admin@gmail.com', 'admin', 1111111111);

INSERT INTO `categories` (`category_id`, `category_name`, `user_category_id`) VALUES 
('1', 'Hindi', 1),
('2', 'English', 1),
('3', 'Telugu', 1),
('4', 'Malayalam', 1),
('5', 'Spanish', 1);

INSERT INTO `uploads` (`song_path_id`,`song_path`,`song_name`,`category_id`,`user_id`) VALUES 
(1,'songs/Hindi/Chahu Mai Ana.mp3', 'Chahu Mai Yana', 1, 1);