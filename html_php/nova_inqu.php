<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquetes</title>

    <link rel="stylesheet" href="../style_globala.css">
    <link rel="stylesheet" href="../css/nova_inqu.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <div class="content" >
            <header>
                <div class="agrup_title">
                    <h1>
                    Escreva <br>
                    sua questão!
                    </h1>
    
                    <h2>
                        Você pode criar enquetes para descobrir a opnoão de seus amigos 
                    </h2>

                </div>
                <img src="../imgs/question-circle-regular.svg" alt="Logo">
            </header>


            <form action="#" method="get">
            <input type="text" name="pergunta" id="pergunta" placeholder="Escreva aqui sua pergunta..." wrap="hard" required />

                <div id="alternativa">
                 <input type="text" name="alternativa1" id="alternativa1" placeholder="Alternativa 1"/>
                </div> 

                <center><input type="button" value="+"id = 'bt_mais_alt'></center>

            <div id="btns">
                <button type="submit">
                    Enviar 
                </button>

                <button type="button" id="bt_cancelar">
                    Cancelar 
                </button>
            </div>
        </form>            
        </div>      
        
    </main>



    <script type="text/javascript">
        let alternativaCx = document.querySelector('#alternativa');
        let bt_mais_alt = document.querySelector('#bt_mais_alt');

        let btCancelar = document.querySelector('#bt_cancelar');

        btCancelar.addEventListener("click",()=>{
            location.href = "../html_php/logado.php";
        });

        let valorGiro = 1;

        bt_mais_alt.addEventListener("click",addAlternativas);

        function addAlternativas(){
            if (valorGiro < 6){          
                valorGiro++;

                let alternativa = document.createElement('input');
                let type = document.createAttribute('type');
                type.value = 'text';
                alternativa.setAttributeNode(type);

                let placeholder = document.createAttribute('placeholder');
                placeholder.value = 'Alternativa '+valorGiro;
                alternativa.setAttributeNode(placeholder)

                let name = document.createAttribute('name');
                name.value = 'alternativa'+valorGiro;
                alternativa.setAttributeNode(name)


                alternativaCx.appendChild(alternativa);
            }
            else {
                alert("Você pode criar 6 alternativas para cada enquete");
            }    
        }
    </script>     
</body>
</html>