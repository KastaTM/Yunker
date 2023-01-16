-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2022 a las 14:04:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yunker`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `IdCliente` varchar(40) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`IdCliente`, `Nombre`) VALUES
('danixrivas', 'Ensalada César'),
('gema.99', 'Vegetariana Burger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` varchar(40) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Contrasenia` varchar(300) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Tipo` varchar(40) NOT NULL,
  `Foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre`, `Contrasenia`, `FechaNacimiento`, `Correo`, `Tipo`, `Foto`) VALUES
('admin', 'Administrador', '$2y$10$O.ZcG8DhcdM.wbDIWBEl1uJOKRKJspqI565K72reo0uMl3AJn6Mna', '1992-08-15', 'admin@gmail.com', 'admin', 'img/fotosClientes/admin.png'),
('aitorma.82', 'Aitor Marqués Alonso', '$2y$12$qckYqQbTBaCYF0ZHh.Iu9..oFRGECUY1Tdn24KjUzbE3XeRr2JN8K', '1995-02-08', 'aitorma82@gmail.com', 'normal', 'img/fotosClientes/pikachu.jpg'),
('andrea03', 'Andrea Villalón Vegas', '$2y$12$s5g/.0AB9sywRobet4KyMOcFWADJ.Tv5wJC71ceu0igE1NpawNcua', '2000-09-07', 'andrea03@gmail.com', 'normal', 'img/fotosClientes/gato.jpg'),
('danixrivas', 'Daniel Rivas Villar', '$2y$12$PQD/gBcsGS5Xk4xR/L9kH.0c.cdhY/c7M7WvOuszRE//gxjFIK43u', '1998-08-23', 'danixrivas11@gmail.com', 'normal', 'img/fotosClientes/edificio.jpg'),
('gema.99', 'Gema Villadelmar Álvarez', '$2y$12$vj65OKDYBqqaFH8BsDMdBO7GTBt984T0aUsAI1RNhKFj.FfOgsk4y', '1999-12-17', 'gema99@gmail.com', 'normal', 'img/fotosClientes/perro.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Nombre` varchar(40) NOT NULL,
  `Precio` float NOT NULL,
  `Descripcion` varchar(7000) NOT NULL,
  `Imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
('Agua', 1, 'Agua mineral Bezoya 1,5l.', 'img/imagenesProductos/agua.jpg'),
('Aros de Cebolla', 8.5, '10 Unidades Aros de Cebolla en Tempura con Miel de Caña.', 'img/imagenesProductos/arosdecebolla.jpg'),
('Batido de Oreo', 5.9, 'Batido de oreo con chocolate y nata.', 'img/imagenesProductos/batidodeoreo.jpg'),
('Coca Cola', 2, 'Coca Cola 200ml.', 'img/imagenesProductos/cocacola.jpg'),
('Ensalada César', 10.5, 'Con pollo a la parrilla original, picatostes, bacon, lascas de queso parmesano y salsa césar.', 'img/imagenesProductos/ensaladacesar.jpg'),
('Kikiriki Burger', 11.5, 'Pechuga de pollo marinada con especias peruanas, a la parrilla con guacamole, lechuga, tomate, queso americano y bacon parrillero.', 'img/imagenesProductos/kikiriki.jpg'),
('Nachos', 13.9, 'Servidos con chili con carne, salsa cheddar, pico de gallo, jalapeños y guacamole.', 'img/imagenesProductos/nachos.jpg'),
('Nestea', 2, 'Nestea 500ml.', 'img/imagenesProductos/nestea.jpg'),
('Órale Burger', 13.5, '200 gr de carne, lechuga, tomate, pico de gallo, queso mozzarella fundido, chili con carne, guacamole y jalapeños.', 'img/imagenesProductos/orale.jpg'),
('Quesadillas', 8.9, 'Pollo parrillero, queso fundido, chili con carne, toques de guacamole y pico de gallo.', 'img/imagenesProductos/quesadillas.jpg'),
('Royal C Burger', 12.5, 'Queso de cabra, cebolla caramelizada, pimiento caramelizado, tomate, lechuga y 200 gr de carne.', 'img/imagenesProductos/royalc.jpg'),
('Tarta de Queso', 4.8, 'Tarta casera de queso. Con mermelada de arándanos.', 'img/imagenesProductos/tartadequeso.jpg'),
('Texas Burger', 12.5, 'Lechuga, tomate 200 gr de carne, salsa barbacoa, queso americano fundido, bacon parrillero y cebolla roja frita.', 'img/imagenesProductos/texas.jpg'),
('Tony Montana Burger', 12.95, 'Aros de cebolla en tempura, salsa bbq, queso cheddar fundido, 2 niveles de carne 100 gr y coronada con Mayonesa de bacon. ', 'img/imagenesProductos/tonymontana.jpg'),
('Vegetariana Burger', 11.5, 'Beyond Burger, es la primera hamburguesa a base de plantas, SIN GLUTEN, 110 gr de hamburguesa, lechuga, tomate, cebolla y queso fundido.', 'img/imagenesProductos/vegetariana.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL,
  `IdCliente` varchar(40) NOT NULL,
  `FechaVenta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`IdVenta`, `IdCliente`, `FechaVenta`) VALUES
(12425434, 'andrea03', '2022-02-10'),
(84124991, 'aitorma.82', '2022-01-18'),
(92144540, 'gema.99', '2022-03-01'),
(738347466, 'danixrivas', '2022-04-11'),
(828555378, 'andrea03', '2022-03-09'),
(998825093, 'danixrivas', '2022-02-14'),
(1139572322, 'aitorma.82', '2022-02-22'),
(1449092706, 'aitorma.82', '2022-04-04'),
(1541896291, 'aitorma.82', '2022-03-29'),
(2098909560, 'aitorma.82', '2022-04-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD UNIQUE KEY `FOREIGN_KEY` (`Nombre`) USING BTREE,
  ADD KEY `FOREIGN_KEY2` (`IdCliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `FOREIGN_KEY` (`IdCliente`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`Nombre`) REFERENCES `productos` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
