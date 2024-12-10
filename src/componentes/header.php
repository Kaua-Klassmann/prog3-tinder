<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>header</title>
</head>
<style>
.header {
    display: flex;
    justify-content: center;
    align-items: center;
   margin-top: 2dvh;
}

.header h1 {
    width: 130dvh;
    height: 10dvh;
    background-color: #ce6c04db;
    color: rgb(255, 255, 255);
    font-size: 2rem;
    margin-bottom: 2dvh;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 2dvh;
}
header{
    width: 100%;
    height: 15dvh;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 15px;
    box-shadow: 0 5px 15px rgb(0, 0, 0);
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
#divLogoImg{
    width: 30%;
    height: 15dvh;
    display: flex;
    align-items: center;
    margin-left: 2dvh;
}
#lblName{
    margin-left: 3dvh;
    color: black;
    font-size: 2.5em;
}
#ImgLogo{
    width: 13dvh;
    height: 13dvh;
    background-color: rgb(234, 234, 234);
    border-radius: 50%;
    box-shadow: 7px 5px 7px rgb(0, 0, 0);
    overflow: hidden;
}
#divButtonRanking{
    width: 40%;
    display: flex;
    justify-content: center;
}
#btnRanking{
    text-align: start;
    padding-left: 1dvh;
    width: 30dvh;
    height: 7dvh;
    background-color:  #c4c4c4;
    border-radius: 3dvh;
    font-size: 1em;
    cursor: pointer;
    border: none;

    transition-timing-function: ease-in ;
    transition-delay: 0.5ms;
}
#divUser{
    width: 30%;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
#lblemail{
    font-size: 0.9em;
}
#divImgLblUser{
    display: flex;
    align-items: center;
    justify-content: end;
    margin-right: 2dvh ;
}
#imgUser{
    width: 8dvh;
    height: 8dvh;
    margin-right: 2dvh;
}
#divBtnLeave{
    display: flex;
    justify-content: center;
    padding-left: 20dvh;
}
#btnLeave{
    width: 8dvh;
    height: 4dvh;
    background-color: rgb(223, 30, 30);
    color: white;
    border-radius: 1dvh;
    border: none;
    font-size: 0.8em;
    cursor: pointer;
}
#btnLeave:hover{
    background-color: #bc1d0c;
}
</style>
<script>
    function navegarParaPagina(select) {
        const url = select.value;
        if (url) {
            window.location.href = url;
        }
    }
</script>
<body>
    <header>
        <div id="divLogoImg">
            <img id="ImgLogo" src="../../img/logotrabalhoprog[1].png" alt="">
            <label id="lblName">CodeRate
            </label>
        </div>
        <select id="btnRanking" onchange="navegarParaPagina(this)">
            <option value="../init/" <?php  if($_SESSION['page'] == "init") { echo "selected"; }?>>🏠 Menu</option>
            <?php 
                if(isset($_SESSION['admin'])) {
                    echo '<option value="../add_language/"'; 
                    if ($_SESSION['page'] == "add_language") { echo "selected"; }
                    echo '>📝 Cadastrar Linguagem</option>';
                }
            ?>
            <option value="../rank/" <?php  if($_SESSION['page'] == "rank") { echo "selected"; }?>>🏆Melhores Linguagens</option>
        </select>
        <div id="divUser">
            <div id="divImgUser">
            <div id="divImgLblUser">
                <div id="imgUser">
                    <img id="imgUser" src="../../img/userIMg.png" alt="">
                </div>
               <div id="lblUser">
                <label id="lblemail"> Olá, <?php echo $_SESSION['email']; ?></label>
               </div>
            </div>
            </div>
            <div id="divBtnLeave">
                <a href="../deslogar.php"><button id="btnLeave">Sair</button></a>
            </div>
        </div>
    </header>
</body>
</html>