CREATE TABLE products (
    `id`            INT AUTO_INCREMENT PRIMARY KEY, 
    `name`          VARCHAR(100) NOT NULL,
    `image`         text NOT NULL,
    `price`         INT NOT NULL
);

INSERT INTO `products` (`id`, `name`, `image`, `price`) VALUES
(1, 'Ikebana1', 'https://s-media-cache-ak0.pinimg.com/564x/6c/c6/c5/6cc6c5279ddda0d34875c3257933a82a.jpg', 560),
(2, 'Ikebana2', 'https://s-media-cache-ak0.pinimg.com/236x/80/d4/b9/80d4b987c770cf9e25629856ac1b012a.jpg', 58),
(3, 'Ikebana3', 'https://s-media-cache-ak0.pinimg.com/564x/bd/79/8e/bd798e740ac311144e8c4c1eaee388c2.jpg', 264),
(4, 'Ikebana4', 'https://s-media-cache-ak0.pinimg.com/564x/46/f4/ec/46f4ec233c10a77f14320ab3a27d69fb.jpg', 580),
(5, 'Ikebana5', 'https://s-media-cache-ak0.pinimg.com/236x/1d/a5/2f/1da52f9d947678b55352ef62120f4359.jpg', 581),
(6, 'Ikebana6', 'https://s-media-cache-ak0.pinimg.com/236x/d7/d9/53/d7d953680c33b3e6de26a5dff02fb270.jpg', 582),
(7, 'Ikebana7', 'https://s-media-cache-ak0.pinimg.com/236x/67/9f/85/679f856e8897b834686c23475af5bc95.jpg', 583);
