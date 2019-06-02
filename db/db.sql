CREATE DATABASE IF NOT EXISTS `php-app`;
USE `php-app`;

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `product` (`name`, `description`) VALUES
('Shoes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet turpis vitae ante fringilla elementum. Sed eleifend nulla et augue ullamcorper, nec porta sem consectetur. Suspendisse sagittis dolor et lobortis molestie. Etiam pellentesque magna et vulputate tempor. Suspendisse eget tellus ullamcorper turpis semper sodales. Mauris pharetra malesuada gravida. Cras vel molestie nisi, eget suscipit dui. In convallis molestie ante ut ultricies. Donec nisi nibh, dapibus sed vulputate ac, auctor eget felis. Nam a ligula urna. Cras sit amet elementum ipsum. Praesent placerat egestas libero. Vestibulum porttitor, elit eu interdum gravida, est elit aliquam neque, ac malesuada eros dolor sit amet erat.\r\n\r\nDuis sed sapien sit amet lectus vehicula semper et at risus. In nisl tortor, elementum imperdiet metus non, rutrum dignissim dolor. Suspendisse et ligula felis. Nunc iaculis tellus in nisi ornare, in porttitor arcu ultrices. Pellentesque tristique eget sem vitae volutpat. Proin sodales luctus lobortis. In blandit fermentum tempus. Donec aliquet elementum nulla, et maximus diam hendrerit non. Aenean nec placerat sapien, a dapibus urna.'),
('T-Shirt', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut sit amet turpis vitae ante fringilla elementum. Sed eleifend nulla et augue ullamcorper, nec porta sem consectetur. Suspendisse sagittis dolor et lobortis molestie. Etiam pellentesque magna et vulputate tempor. Suspendisse eget tellus ullamcorper turpis semper sodales. Mauris pharetra malesuada gravida. Cras vel molestie nisi, eget suscipit dui. In convallis molestie ante ut ultricies. Donec nisi nibh, dapibus sed vulputate ac, auctor eget felis. Nam a ligula urna. Cras sit amet elementum ipsum. Praesent placerat egestas libero. Vestibulum porttitor, elit eu interdum gravida, est elit aliquam neque, ac malesuada eros dolor sit amet erat.\r\n\r\nDuis sed sapien sit amet lectus vehicula semper et at risus. In nisl tortor, elementum imperdiet metus non, rutrum dignissim dolor. Suspendisse et ligula felis. Nunc iaculis tellus in nisi ornare, in porttitor arcu ultrices. Pellentesque tristique eget sem vitae volutpat. Proin sodales luctus lobortis. In blandit fermentum tempus. Donec aliquet elementum nulla, et maximus diam hendrerit non. Aenean nec placerat sapien, a dapibus urna.');
