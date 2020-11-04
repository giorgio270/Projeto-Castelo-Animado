<?php
session_start();
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "    <meta charset='UTF-8'>";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "    <link rel='stylesheet' href='estilo.css'>";
echo "    <title>Castelo Animado</title>";
echo "</head>";
echo "<body class='bodyIndex'>";
echo "    <div class='menu'>";
echo "        <ul>";
                if(isset($_SESSION['login'])){
                    echo "<a href='conta.html'><li>".$_SESSION['login']."</li></a>";
                    echo "<a class='but' href = 'https://casteloanimado.azurewebsites.net/deslogar.php'><input type='button' class='button' name='logout' value='Deslogar' /></a>";
                }else{
                    echo "<a href='login.html'><li>Login</li></a>";
                    echo "<a href='cadastro.html'><li>Cadastrar</li></a>";
                }
echo "        </ul>";
echo "    </div>";
echo "    <div class='geral'>";
echo "        <div class='conteudo'>";




echo "            <div class='bloco01'>";
echo "                <div class='imagem01'>";
echo "                    <img src='imagens/icone_escola.png' alt=''>";
echo "                </div>";
echo "                <div class='imagem02'>";
echo "                    <img src='imagens/icone_jogos.png' alt=''>";
echo "                </div>";
echo "                <div class='imagem03'>";
echo "                    <img src='imagens/icone_musicas.png' alt=''>";
echo "                </div>";
echo "            </div>";



echo "            <div class='bloco02'>";
echo "                <div class='imagem04'>";
echo "                    <img src='imagens/icon01.jpg' alt=''>";
echo "                </div>";
echo "                <div class='imagem05'>";          
echo "                    <img src='imagens/icon02.jpg' alt=''>";
echo "                </div>";
echo "                <div class='imagem06'>";
echo "                    <img src='imagens/icon03.jpg' alt=''>";
echo "                </div>";
echo "            </div>";


        
echo "            <div class='bloco03'>";
echo "                <class class='texto01'><span>Venha conhecer nossos jogos educativos!</span></class>";
echo "                <class class='texto02'><span>Um novo desafio de jogo da velha o aguarda.<br> Venha descobrir!</span></class>";
echo "                <class class='texto03'><span>Novo lançamento da Galinha Pintadinha.<br> Venha Conferir!</span></class>";
echo "            </div>";
echo "        </div>";
echo "    </div>";
echo "</body>";
echo "</html>";
?>