-- phpMyAdmin SQL Dump
-- version 5.2.2-1.fc40.remi
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2025 a las 19:42:18
-- Versión del servidor: 10.11.10-MariaDB
-- Versión de PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bookclubdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `favorito` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `post_content`, `image_url`, `created_at`, `favorito`) VALUES
(1, 6, 'La Historia Interminable', 'Descubre este inolvidable libro de aventuras, La historia interminable de Michael Ende, en esta preciosa edición de Alfaguara Clásicos. La Emperatriz Infantil está mortalmente enferma y su reino, Fantasía, corre un grave peligro. La salvación depende de Atreyu, un valiente guerrero de la tribu de los pieles verdes, y Bastian, un niño tímido que lee con pasión un libro mágico. Solo un ser humano puede salvar este lugar encantado. Juntos emprenderán un fascinante viaje a través de tierras de dragones, gigantes,...', 'https://static.fnac-static.com/multimedia/Images/ES/NR/53/6b/00/27475/1507-1.jpg', '2025-02-10 12:40:26', 1),
(2, 6, 'Devoción', 'En el mundo del espíritu no hay fronteras, la ausencia de fronteras es lo propiamente espiritual. Un místico de hoy puede sentir a un místico de cualquier pasado como a un verdadero hermano. A esta conclusión tan sencilla como universal llega el autor en su versión de El peregrino ruso, un clásico de la literatura devocional, así como en las principales enseñanzas de cara al auto-conocimiento que extrae de su estudio.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/98/69/92/9595288/1540-1.jpg', '2025-02-10 13:34:13', 0),
(3, 2, 'Habitos atómicos', 'James Clear, el reconocido autor de este best-seller de auto-ayuda,  comienza el libro enunciando y describiendo por qué los hábitos tienen una influencia directa y tan importante en el desarrollo de nuestras vidas. Resultando clave no solo en aquello que hacemos, sino también en el modo en el que vemos el mundo, teniendo una incidencia final directa en la consecución del éxito de todo aquello que nos proponemos y en la felicidad que sentimos en nuestro día a día. Tras esto, enumera aquellos cuatro pasos que considera fundamentales para nuestro éxito.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/12/6e/57/5729810/1507-1.jpg', '2025-02-10 14:28:42', 1),
(4, 2, 'El Principito', 'Considerado uno de los mejores libros del siglo xx, se trata de la novela francesa más leída y traducida de todos los tiempos, pese a que la dominación nazi no permitió su edición en Francia hasta 1945. Aunque se ha confundido con un libro infantil, El principito, escrito en el exilio de Estados Unidos, país donde vio la luz por primera vez en 1943, es en realidad una fábula mítica y filosófica sobre la historia de un aviador perdido en el desierto de Sáhara tras sufrir una avería y un niño proveniente de otro planeta....', 'https://static.fnac-static.com/multimedia/Images/ES/NR/19/40/91/9519129/1507-1.jpg', '2025-02-10 14:33:47', 0),
(8, 1, 'Perturbaciones atmosféricas', 'Una tarde cualquiera en Nueva York, el psiquiatra Leo Liebenstein se da cuenta de que la mujer que ha entrado en su casa con un perro y actúa como Rema -su esposa de origen argentino sobre la que sabe casi todo pero también, en cierto sentido, poco y nada- no es Rema. O él cree que no es Rema. El simulacro, como él la llama, parece su mujer ``representada por alguien un poco mayor``. El doctor Liebenstein, que narra la historia, emprende entonces la búsqueda de su esposa real en simultáneo con la búsqueda de uno de sus...', 'https://static.fnac-static.com/multimedia/Images/ES/NR/20/6f/94/9727776/1540-1.jpg', '2025-02-11 10:06:57', 0),
(10, 4, 'Tiempo de tormentas', 'Desde muy niño, Boris sabe que es diferente. Muy temprano se detectan problemas de motricidad y dislexia, y el pequeño actúa con unos gestos y una forma de hablar amaneradas. Los adultos dicen que su madre, Belén, una bailarina de renombre, y su padre, crítico de cine, rodean al niño de malas compañías. En Caracas se habla de sus amigos intelectuales y de toda esa gente homosexual con la que ella trabaja. También que Boris está enamorado de Gerardo, el hijo de la influyente periodista Altagracia Orozco. Sin embargo, Belén...', 'https://static.fnac-static.com/multimedia/Images/ES/NR/fb/e9/15/1436155/1540-1/tsp20180123132414/Tiempo-de-tormentas.jpg', '2025-02-11 10:35:10', 0),
(12, 4, 'Ansia', 'Tras el éxito de La mala leche, vuelve Henar Álvarez con una adictiva novela sobre el deseo y las relaciones de poder con erotismo bruto de fondo. Natalia es una mujer ansiosa, que vive dominada por sus pulsiones y parece condenada a portarse mal. El día que su amante la deja, se encuentra perdida y atrapada en una vida matrimonial insatisfactoria. Lejos de conformarse, Nat comienza a dar rienda suelta a su lujuria y sus instintos más bajos. Su irreprimible deseo sexual y una obsesión creciente por sentirse joven y deseada...', 'https://static.fnac-static.com/multimedia/Images/ES/NR/21/67/87/8873761/1540-1.jpg', '2025-02-11 11:08:48', 1),
(14, 7, 'Codigo fuente', 'La historia de los comienzos de uno de los líderes empresariales y filántropos más transformadores e influyentes del mundo moderno. Los éxitos empresariales de Bill Gates son de sobra conocidos: el estudiante de veinte años que dejó sus estudios en Harvard para fundar una compañía de software que creció hasta ser un gigante de la industria y cambió para siempre la forma de trabajar y de vivir; el multimillonario que se convirtió en filántropo para abordar el cambio climático, la salud mundial y la educación en Estados', 'https://static.fnac-static.com/multimedia/Images/ES/NR/27/b3/90/9483047/1540-1.jpg', '2025-02-11 11:52:27', 1),
(15, 7, 'Las frases robadas', 'José Luis Sastre es una de las voces más relevantes del periodismo actual, y su talento como cronista y articulista se ha trasladado ahora a su primera novela. Las frases robadas es un relato emotivo y feliz sobre la memoria, la dignidad y la muerte que explica cómo una hija puede conocer a su padre a partir de las lecturas que leyó y subrayó. Es, sobre todo, un desprejuiciado canto a la vida.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/cb/39/8c/9189835/1507-1.jpg', '2025-02-11 11:54:02', 0),
(16, 7, 'Orbital', 'Un himno maravilloso a lo ordinario y lo espectacular narrado a cuatrocientos quilómetros de la tierra.Premio Booker 2024. Un grupo de seis astronautas lleva a cabo una misión rutinaria en la Estación Espacial Internacional, en la órbita terrestre baja. La de Pietro, italiano, es monitorizar los microbios presentes en la nave. Chie, la tripulante japonesa, cultiva cristales de proteínas y, al igual que sus compañeros, es objeto de estudio del impacto de la microgravedad en el funcionamiento neuronal.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/4c/a0/91/9543756/1507-1.jpg', '2025-02-11 11:57:32', 0),
(17, 7, 'Luciernaga', 'PREMIO LUMEN DE NOVELA 2024 .«Una voz deslumbrante y conmovedora, con la difícil cualidad de la sencillez. Una novela luminosa y radiactiva».\r\nDel acta del jurado Después de dudar, me pide que comience describiendo su foto preferida, en la que está en bikini con un arenque en las manos, simulando que le da un beso. Su vientre es plano, aún no pasó por los embarazos. Sus ojos reflejan el brillo del agua del río Prípiat mientras su primo le toma la foto. Faltan diez años para que la central nuclear de Chernóbil explote.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/f3/a9/8c/9218547/1507-1.jpg', '2025-02-11 11:59:18', 1),
(19, 8, 'El arte de ser humanos', 'El arte de ser humanos es un fascinante viaje a través de las artes, la neurociencia y la educación que redefine el modo que tenemos de  percibir el mundo y a nosotros mismos. David Bueno explora magistralmente cómo las artes -desde la música y la poesía hasta la ciencia y la filosofía- son una expresión única de la humanidad y un motor esencial para el crecimiento cognitivo, emocional y social.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/c2/e7/92/9627586/1540-1.jpg', '2025-02-11 13:53:19', 1),
(21, 1, 'Las que no duermen', 'En los Valles Tranquilos no gusta desenterrar secretos ni revelar verdades. Prepárate para la noche más larga. LA NUEVA NOVELA DE DOLORES REDONDO 2.ª ediciónLa psicóloga forense Nash Elizondo documenta el origen de una leyenda sobre brujería en la sima de Legarrea, en uno de los Valles Tranquilos de Navarra, pero cuando desciende a la sima lo que halla es el cadáver de una joven desaparecida tres años atrás, Andrea Dancur; un caso que conmocionó al país entero, y por cuyo crimen una mujer cumple prisión.', 'https://static.fnac-static.com/multimedia/Images/ES/NR/fe/11/8f/9376254/1507-1.jpg', '2025-02-11 16:14:21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `created_at`) VALUES
(1, 'Valeria', 'Lopez', 'email1@fakemail.com', '$2y$10$u0x2SZ0cAbQGQeM0uEAy9.uqRCMH43OcAB0LR5HMmMgUFmHNF/Vhy', '2025-02-09 18:21:28'),
(2, 'Pedro', 'Perez', 'perez@micorreo.com', '$2y$10$OB8IHSDZKRx9zUGP7Kcc7OOKtHsH.gCHo5sB8UTbw1a4//gy0yxnq', '2025-02-09 18:25:07'),
(3, 'Aitana', 'Torres', 'atorres88@fakemail.com', '$2y$10$vevuvMnFO2FC0qFtQ3Z.EeVr0XBFKWfwxYn0XBMkPvhrmJqytT/VW', '2025-02-09 18:28:52'),
(4, 'Mariana', 'Molero', 'molero50@mail.com', '$2y$10$CnuckFFSYjJdojcPNum/LuDzLmzWwhaaw5ILI/EiywJ5A8GaPcnlW', '2025-02-09 20:47:53'),
(6, 'Maria', 'Mendez', 'mendez@mail.com', '$2y$10$xvFWxV9.EVBLvLg1X4FVy.VQIFRCJXWW1N.gQ0THpsIFKwkhUsKKq', '2025-02-10 08:51:15'),
(7, 'Irene', 'Suarez', 'irene@gmail.com', '$2y$10$eMSN2JNJ06UFObzPd1zvvu4SAHEVN18kzev6T3AbSOdKvpu6uXirW', '2025-02-11 10:46:54'),
(8, 'José', 'Fuentes', 'fuentes@gmail.com', '$2y$10$s6bM4js8nmDZVg3rQcDFI.f5mcqfZOGrDd0CGyWcWCKMDunt6CrYu', '2025-02-11 11:02:10'),
(9, 'Oliver', 'Gutierrez', 'oliver@fakemail.com', '$2y$10$VoYqFiSN.rfCyUVMW7zAuOHkgR3/ePGb.KWECRQJ8kDYv6iJXOSNS', '2025-02-11 16:02:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
