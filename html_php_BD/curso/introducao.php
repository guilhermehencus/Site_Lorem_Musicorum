<!DOCTYPE html>

<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title> Introdução </title>
    <link rel="stylesheet" href="../../css/header_c.css"/>
    <link rel="stylesheet" href="../../css/base.css"/>
    <link rel="stylesheet" href="../../css/footer.css"/>
    <link rel="icon" href="../../img/Logo_Musica4.png" />
</head>

<body>
    <header>
        <h1>
            <div id="fig-logo">
                <img id="logo" src="../../img/Logo_Musica3.png" alt="Logo do Site" />
            </div>
            <a id="login" href="../bd_l/login.php">Entre ou Cadastre-se</a>
        </h1>
        <!-- -->
        <nav>
            <ul>
                <li id="index"><a href="../index.php">Página Inicial</a></li>
                <li id="faq"><a href="../faq.php">FAQ</a></li>
                <li id="aboutus"><a href="../sobre.php">Sobre Nós</a></li>
                <li id="help"><a href="../ajuda.php">Ajuda</a></li>
                <li>
                    <input type="search" value="Pesquisar" />
                    <button type="submit" value="Buscar">Buscar</button>
                </li>
            </ul>
        </nav>
        <!-- -->
    </header>

    <!-- Corpo -->
    <section class="conteudo">
        <h2 id="o_que_e">O que é música?</h2>
        <!-- Conteudo -->
        <div class="texto">
            <p>
                Essa pergunta pode ser fácil ou complicada de se responder responder. Para entendermos
                o que é música, primeiro precisamos saber o que é o som e quais características ele possui.
            </p>

            <h3 id="o_som">O Som</h3>
            <p>
                Música nada mais é do que vários sons organizados. Por exemplo, se alguém tocar as teclas brancas
                de um piano de forma aleatória, pode ser que ela descubra como organiza-las para poder tocar uma música
                conhecida que muitas crianças aprenden logo no inicio: Asa Branca de Luiz Gonzaga. Mas ao mesmo tempo, se
                jogarmos um piano escada abaixo não haverá organização alguma e sairá apenas barulho e no final teremos
                um piano quebrado.
            </p>

            <p>
                Cada som possui quatro características relevantes para o compositor e para diferenciarmos o que
                está produzindo determinada sonoridade. Vamos usar um boi e um pardal como exemplo:
                <br /><br />
                - O pardal irá produzir um som curto, enquanto o boi irá produzir um som longo.
                <br />
                - O boi dará um mugido forte, enquanto o pardal um piado fraco.
                <br />
                - O pardal emite um som agudo, enquanto o boi, um som grave.
            </p>

            <p>
                Para essas três caracteristicas, vamos chama-las de <b>duração, intensidade e altura</b> respectivamente.
                Mas ainda falta uma caracteristica importante na diferença entre esses sons, mas é abstrato de um modo
                que ouvindo estará nítido, mas não há como descrever exatamente por texto. Esse é o conceito de <b>timbre</b>.
                O pardal nunca irá chegar no timbre de um boi, mesmo que ele sofra mutções para fazer seu piado ser mais
                grave e instenso que o normal. Assim como o boi não terá o timbre de um pardal, mesmo que o mugido seja
                agudo e <a onclick="alert('Piano vem do italiano e seu significado é o mesmo da nossa palavra em português: fraco. Daí vem aquela frase *fica pianinho aí*, que esquivale a *fica quietinho* ou *baixa a bola*')">piano</a>,
                não será suficiente para alcançar o timbre.
            </p>

            <h3 id="duracao">Duração</h3>

            <p>
                Como já diz o nome, é a duração que um som possui e que <b>poderia</b> ser medido em segundos, se
                não estivéssemos falando de música. A duração, nesse caso vai ser contada em <b>tempos</b>, e a duração
                de cada tempo vai variar de acordo com o número de <b>bpm</b> (batidas por minuto) da música. Quanto maior
                o bpm, mais rápida será a passagem de um tempo para o outro. Para melhor entendimento, uma música com 60bpm
                terá 60 batidas por minuto, o que resulta em cada tempo valendo um segundo, ao passo que se eu dobrar o número
                (de 60 para 120), a música terá cada tempo valendo 1/2 segundo.
            </p>

            <h3 id="intensidade">Intensidade</h3>

            <p>
                É o que chamamos de "volume" e, erroniamente, chamamos no nosso dia a dia de vários nomes como "tom" e
                "altura". A intensidade, se mal trabalhada, pode virar bagunça, principalmente em orquestras e
                shows, onde nenhum instrumento pode cobrir o som do outro a não ser que a música seja escrita
                para que isso aconteça.
            </p>

            <h3 id="altura">Altura</h3>

            <p>
                Altura é o que de fato iremos chamar de "tons", assim como as cores, sons também possuem tonalidades.
                Aprendemos desde cedo, normalmente na pré-escola, que as notas musicais são do, re, mi, fa, sol, la e si,
                quando na verdade temos mais cinco notas, e dependendo da região do mundo onde estiver esse número passa
                tranquilamente de doze para vite e seis notas musicais. De forma resumida, a tonalidade se dá pela distância
                entre as notas, que terá sua variação em Hz (hertz) e a menos que você seja um afinador de piano, físico,
                musicoterapeuta profissional, alguém que estuda música e queira iniciar um projeto de terapia usando a
                frequência 432Hz como base (olha só, se não é sobre isso nossa futura rádio... que coisa, não?), matemático,
                programador ou um desocupado qualquer; você não precisa saber a frequência exata de cada nota musical.
            </p>

            <a class="botoes" href="leitura1.php"> Avançar </a>
            <a class="botoes" href="curso.php"> Voltar </a>

        </div>
        <!-- End Conteudo -->
    </section>
    <!-- End Corpo -->

    <footer>
        <h1><img src="../../img/Logo_Musica4.png" alt="Logo do Site" /></h1>
        &copy; André Haine Santos & Ghuilherme Henrique Guimarães Custódio <br /><br /> Etec Bartolomeu Bueno da Silva - Anhanguera
    </footer>
</body>

</html>