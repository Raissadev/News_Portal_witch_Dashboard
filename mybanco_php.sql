-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Set-2021 às 19:04
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mybanco_php`
--

-- --------------------------------------------------------

--
-- Extraindo dados da tabela `tb_admin.agenda`
--

INSERT INTO `tb_admin.agenda` (`id`, `tarefa`, `data`) VALUES
(1, 'Ir Treinar', '2021-09-11'),
(2, 'Anotar os códigos', '2021-09-11'),
(3, 'Ir ao médico', '2021-09-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `ultima_acao` datetime NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `ultima_acao`, `token`) VALUES
(48, '::1', '2021-09-15 14:04:14', '6142154e84217');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `img`, `nome`, `cargo`) VALUES
(1, 'raissa', 'gaivabeach', '', 'Raissa Arcaro Daros', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `dia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `dia`) VALUES
(1, '::1', '2021-08-18'),
(2, '::1', '2021-08-18'),
(3, '::1', '2021-08-26'),
(4, '::1', '2021-08-26'),
(5, '::1', '2021-08-26'),
(6, '::1', '2021-08-27'),
(7, '::1', '2021-08-27'),
(8, '::1', '2021-08-27'),
(9, '::1', '2021-08-27'),
(10, '::1', '2021-08-27'),
(11, '192.168.0.102', '2021-08-29'),
(12, '::1', '2021-08-30'),
(13, '::1', '2021-08-30'),
(14, '::1', '2021-09-01'),
(15, '::1', '2021-09-03'),
(16, '::1', '2021-09-04'),
(17, '::1', '2021-09-04'),
(18, '::1', '2021-09-09'),
(19, '::1', '2021-09-11'),
(20, '::1', '2021-09-11'),
(21, '::1', '2021-09-13'),
(22, '192.168.0.104', '2021-09-14'),
(23, '::1', '2021-09-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.categorias`
--

CREATE TABLE `tb_site.categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.categorias`
--

INSERT INTO `tb_site.categorias` (`id`, `nome`, `slug`, `order_id`) VALUES
(1, 'Moda', 'moda', 1),
(2, 'Coronavirus', 'coronavirus', 2),
(3, 'Indústria', 'industria', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.comentarios`
--

CREATE TABLE `tb_site.comentarios` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `noticia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.comentarios`
--

INSERT INTO `tb_site.comentarios` (`id`, `usuario_id`, `comentario`, `noticia_id`) VALUES
(30, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis vel nulla at eleifend. Cras in ante egestas, consectetur tortor non, dapibus lorem.', 6),
(31, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis vel nulla at eleifend. Cras in ante egestas, consectetur tortor non, dapibus lorem. Suspendisse dolor massa, sollicitudin eu bibendum...', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.config`
--

CREATE TABLE `tb_site.config` (
  `titulo` varchar(255) NOT NULL,
  `nome_autor` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `icone1` varchar(255) NOT NULL,
  `icone2` varchar(255) NOT NULL,
  `descricao2` text NOT NULL,
  `icone3` varchar(255) NOT NULL,
  `descricao3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.config`
--

INSERT INTO `tb_site.config` (`titulo`, `nome_autor`, `descricao`, `icone1`, `icone2`, `descricao2`, `icone3`, `descricao3`) VALUES
('Meu título', 'Raissa Dev', 'Minha descrição...', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.depoimentos`
--

CREATE TABLE `tb_site.depoimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `depoimento` text NOT NULL,
  `data` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.depoimentos`
--

INSERT INTO `tb_site.depoimentos` (`id`, `nome`, `depoimento`, `data`, `order_id`) VALUES
(1, 'Raissa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non massa sed lectus pretium facilisis. Mauris facilisis turpis vel nibh commodo consequat. Duis sit amet nulla eget orci euismod egestas in sed ex. Nam faucibus eget justo vulputate ornare. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.', '28/08/2021', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.noticias`
--

CREATE TABLE `tb_site.noticias` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `data` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `capa` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.noticias`
--

INSERT INTO `tb_site.noticias` (`id`, `categoria_id`, `data`, `titulo`, `conteudo`, `capa`, `slug`, `order_id`) VALUES
(1, 1, '10/08/2018', 'Wealthy Families Flock to Safe Assets as Recession Fears Mount', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut luctus lorem, vitae consectetur velit. Fusce non augue nec massa dignissim faucibus eget nec erat. Aliquam id est non dui lacinia blandit in varius ligula. Nullam enim neque, vulputate quis viverra non, tempor in lorem. Aenean id leo eu nisl tristique varius eu vel urna. In semper nisi arcu, eu placerat magna consequat a. Suspendisse vulputate metus a viverra congue. Duis tristique mattis mauris sed convallis. Curabitur dignissim purus sed sagittis tempor. Suspendisse fermentum turpis eu mattis vestibulum.\r\n\r\nSed sodales imperdiet arcu, non sagittis orci. Integer elementum enim venenatis nulla dictum, ut consectetur elit iaculis. Mauris fermentum lacus ac tortor elementum finibus. Morbi ut enim nec nulla mattis vulputate eu pharetra augue. Nulla at velit vitae lectus vehicula vestibulum ut eget leo. Suspendisse potenti. Vestibulum at cursus sapien. Nunc bibendum lectus risus, eu accumsan sem fringilla ac. Nunc laoreet non urna eget tristique. Quisque ultrices urna in imperdiet fringilla. Suspendisse tincidunt dui sit amet metus mollis, sed scelerisque dui gravida. Nullam id leo tincidunt, porttitor augue non, viverra diam. Nulla pulvinar urna at ornare euismod. Sed at eleifend tortor, a auctor nisi. Vestibulum sed iaculis nibh, nec ultrices magna.', 'myWallpaper.jpg', 'a-moda-no-mundo', 0),
(2, 2, '10/08/2018', 'Scientists Say The Great Lockdown May Ease Later Than Planned', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeOne.jpg', 'scientists-say-the-great-lockdown', 0),
(3, 3, '10/08/2021', 'Navigating Event Risks Gets Even More Complicated for Planners\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeTwo.jpg', 'navigating-event-risks\r\n', 0),
(4, 3, '10/08/2021', 'Europe’s Plunge Into the Void Captured in Tale of Two Lockdowns', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeOne.jpg', 'europe-plunge-nto', 0),
(5, 2, '10/08/2021', 'Scientists Say The Great Lockdown May Ease Later Than Planned', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'noticeWalp.jpg', 'scientists-say-he-great-lockdown', 0),
(6, 3, '14/09/2021', 'Face Masks to Decoy T-Shirts: The Rise of Anti-Surveillance Fashion', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum non nibh a massa faucibus pulvinar. Aenean feugiat consectetur justo, a pretium dolor dapibus vitae. Morbi sagittis imperdiet erat rhoncus mollis. Aliquam eu justo tempor, volutpat mauris ac, dapibus erat. Fusce tristique, tellus at tempor rhoncus, sapien tellus iaculis lacus, eget congue tellus leo vel enim. Proin sollicitudin enim quam, et faucibus elit consequat varius. Quisque ultricies ligula eu arcu dictum consectetur. Mauris tempor velit neque, mollis accumsan nibh dignissim at. Etiam consequat odio vitae fringilla ultricies.\r\n\r\nSed nec congue turpis. Donec semper lorem at nulla ultricies, non finibus nibh finibus. Cras dictum in turpis in vulputate. Maecenas diam tellus, ultricies dapibus neque a, tempus pharetra orci. Proin in dolor vitae erat viverra commodo. Integer ac sem vel lorem aliquet lobortis. Proin non magna lorem. Morbi quis pretium erat. Vestibulum dignissim nunc diam, nec pulvinar felis pellentesque at. Vivamus sodales erat id purus volutpat, vitae vehicula mi imperdiet. Nulla ligula sapien, facilisis nec ex sit amet, tincidunt vehicula felis. Suspendisse feugiat dictum orci eget ornare. Mauris egestas elementum facilisis. Curabitur quis tempus purus, vitae tempor nisl. Sed quis augue quis magna efficitur feugiat non et enim. Duis id libero et arcu fermentum pulvinar et in justo.', 'cardNoticeThree.jpg', 'face-masks-to-decoy', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.servicos`
--

CREATE TABLE `tb_site.servicos` (
  `id` int(11) NOT NULL,
  `servico` text NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.servicos`
--

INSERT INTO `tb_site.servicos` (`id`, `servico`, `order_id`) VALUES
(1, 'Programadora', 1),
(2, 'Designer UI/UX', 2),
(3, 'Designer UI/UX', 3),
(4, 'Designer UI/UX', 4),
(5, 'Designer UI/UX', 5),
(6, 'Designer UI/UX', 6),
(7, 'Designer UI/UX', 7),
(8, 'Designer UI/UX', 8),
(9, 'Copywriter', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.slides`
--

CREATE TABLE `tb_site.slides` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slide` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.comentarios`
--
ALTER TABLE `tb_site.comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tb_site.categorias`
--
ALTER TABLE `tb_site.categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_site.comentarios`
--
ALTER TABLE `tb_site.comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_site.depoimentos`
--
ALTER TABLE `tb_site.depoimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_site.noticias`
--
ALTER TABLE `tb_site.noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_site.servicos`
--
ALTER TABLE `tb_site.servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_site.slides`
--
ALTER TABLE `tb_site.slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
