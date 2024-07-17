<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Motors</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="../imgs/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">Nexus Motors</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="fornecedor.php">Fornecedor</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="peca.php">Peças</a>
                    </li>

                     </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produto.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="estoque.php">Estoque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="carro.php">Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="venda.php">Vendas</a>
                    </li>                    
                    <li class="nav-item">
                    <?php if (isset($_SESSION['usuario'])) { ?>
                        <a class="nav-link" href="logout.php">Sair</a>
                    <?php } else { ?>
                        <a class="nav-link" href="logar.php">Login</a>
                    <?php } ?>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dúvidas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="marca.php">Carros</a>
                            <a class="dropdown-item" href="endereco.php">Endereço</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../imgs/20.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../imgs/18.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../imgs/23.jpg" class="d-block w-100" alt="...">
            
            </div>
            <div class="carousel-item">
                <img src="../imgs/21.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators"
            data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators"
            data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
    </div>
    <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="../imgs/1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Peças</h5>
                        <p class="card-text"> Na nossa fábrica, a excelência das nossas peças é o coração que impulsiona a qualidade e confiabilidade dos nossos carros</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal1">
                                Saber mais
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel1"></h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../imgs/1.jpg" class="card-img-top mb-3" alt="...">
                                        <p>Utilizamos materiais da mais alta qualidade e tecnologia de ponta para garantir que cada componente atenda aos mais rigorosos padrões de desempenho e durabilidade. Desde motores até sistemas de suspensão, cada peça é cuidadosamente projetada para oferecer máximo desempenho e confiabilidade em todas as condições de direção.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../imgs/2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Veículos</h5>
                        <p class="card-text">Os veículos são mais do que meros meios de transporte; são a materialização da nossa visão de engenharia, estilo e compromisso com a excelência</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal2">
                                Saber mais
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel2"></h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../imgs/2.jpg" class="card-img-top mb-3" alt="...">
                                        <p>Cada modelo é meticulosamente projetado e construído para oferecer uma experiência de condução excepcional, combinando estilo e tecnologia de ponta. Dos compactos ágeis aos robustos utilitários, nossa variedade de veículos atende a todas as necessidades e preferências. Com características inovadoras e sistemas avançados de segurança, nossos veículos proporcionam não apenas uma viagem, mas uma jornada memorável e confiável a cada destino.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="../imgs/3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sustentabilidade</h5>
                        <p class="card-text">A sustentabilidade é o alicerce que sustenta cada etapa do processo de produção, garantindo um impacto positivo no meio ambiente</p>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal3">
                                Saber mais
                            </button>
                        </div>
                        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="exampleModalLabel3"></h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="../imgs/3.jpg" class="card-img-top mb-3" alt="...">
                                        <p>Na vanguarda da inovação automotiva, nossa fábrica de carros investe continuamente em tecnologia avançada para impulsionar o futuro da mobilidade de forma sustentável. Cada veículo que sai de nossas linhas de produção incorpora os mais recentes avanços tecnológicos, desde sistemas de propulsão elétrica até inteligência artificial integrada, visando não apenas aprimorar a experiência de condução, mas também reduzir significativamente o impacto ambiental e promover práticas mais sustentáveis nas estradas</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container mt-5">
        <h2 class="text-center">Sobre nos</h2>
        <p class="text-center">
            Bem-vindo à Nexus Motors, uma fábrica de automóveis onde a inovação e a qualidade se encontram para criar
            veículos excepcionais. Desde nossa fundação, nos dedicamos a produzir carros que não apenas atendam, mas
            superem as expectativas dos nossos clientes.
        </p>
        <p class="text-center">
            Na Nexus Motors, cada veículo é fruto de um processo meticuloso, onde cada detalhe é cuidadosamente
            planejado e executado. Nossa equipe de engenheiros e especialistas em automóveis trabalha incansavelmente
            para garantir que cada carro que sai de nossa fábrica atenda aos mais altos padrões de qualidade e
            desempenho.
        </p>
        <p class="text-center">
            Estamos comprometidos em oferecer não apenas produtos, mas também uma experiência excepcional aos nossos
            clientes. Valorizamos a confiança e a satisfação de quem escolhe um veículo Nexus Motors, e estamos sempre
            prontos para ir além para garantir sua plena satisfação.
        </p>
        <p class="text-center">
            Estamos ansiosos para recebê-lo em nossa loja e esperamos que você se sinta à vontade em nos visitar.
        </p>
    </div>



    <section id="social">
            <h2 style="text-align: center; color: rgb(29, 37, 37);">Redes Sociais</h2>
            <div class="social-links">
                <a href="https://www.facebook.com/seuperfil" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.linkedin.com/home" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="https://www.twitter.com/seuperfil" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/seuperfil" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            </div>
        </section>
 


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
    <footer class="page-footer font-small bg-dark text-light p-3 mt-5">
        <div class="text-center">
            &copy; <?php echo date("Y"); ?> Nexus Motors
        </div>
    </footer>
</html>
