<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>            
        <script type="text/javascript" src="js/admUsuarios.js"></script>     
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/jquery-2.0.3.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <meta name="Keywords" content="palabras claves">
        <meta name="Description" content="este sitio esta creado para las mascotas perdidas">
        <meta name="Author" content="Lucas Lopez - Luca Miraglia">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body>
        {include file="cabezal.tpl"}
        
        <div class="registros" class="izq">
            <p class="izq">Para registrarse por favor llene el siguiente formulario: </p>
            <form>
                <table>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text"  class="noVoid" id="cvNombre"><br><div id="errcvNombre" class="mensaje"></div></td> 							
                    </tr>
                    <tr>
                        <td>Apellido:</td>
                        <td><input type="text" value="" class="noVoid" id="cvApellido"><br><div id="errcvApellido" class="mensaje"></div></td> 
                    </tr>
                    <tr>
                        <td>Edad:</td>
                        <td><input type="text" value="" class="isNum" id="cvEdad"><br><div id="errcvEdad" class="mensaje"></div></td> 
                    </tr>
                    <tr>
                        <td>Sexo:</td>
                        <td><input type="radio" name="cvGender" id="cvMale"> Masculino</td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="radio" name="cvGender" id="cvFemale"> Femenino</td> 
                    </tr>
                    <tr>
                        <td>Años de experiencia laboral <br>(si busca su primer trabajo, coloque 0 en este):</td>
                        <td><input type="text" value="" class="isNum" id="cvExp"><br><div id="errcvExp" class="mensaje"></div></td> 
                    </tr>
                    <tr>
                        <td>Maneja programas informáticos:</td>
                        <td><input type="radio" name="cvProgramas" class="cvProgramas" id="cvSi"> Si
                        <input type="radio" name="cvProgramas" class="cvProgramas" id="cvNo"> No<br></td> 
                    </tr>
                    <tr class="cvProg">
                        <td>Cuales:</td>
                        <td>
                            <input type="checkbox" name="informaticos" id="cvWord"> Word <br>
                            <input type="checkbox" name="informaticos" id="cvExcel"> Excel<br>
                            <input type="checkbox" name="informaticos" id="cvPp"> Power Point <br>
                            <input type="checkbox" name="informaticos" id="cvAccess"> Access <br>
                            <input type="checkbox" name="informaticos" id="cvCe"> Correo electrónico <br>
                            <input type="checkbox" name="informaticos" id="cvInternet"> Navegadores de Internet
                        </td> 
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><img src="imagenes/btnReg.png" id="usr" class="btn" id="regUsr"></td>
                    </tr>
                </table>
            </form>
        </div>
        
        <div style="float: left">
            {include file="menu.tpl"}
        </div>
        <div style="float: right; align-content: center">
                <h1>Alta de Usuarios</h1>
                <form method="POST" action="graboUsuario.php">
                    Usuario: <input type="text" id="usuUsuario" name="usuUsuario"/>
                    <br>
                    Clave: <input type="password" id="usuClave" name="usuClave"/>
                    <br>
                    Correo: <input type="text" id="usuCorreo" name="usuCorreo"/>
                    <br>
                    <input type="submit" value="Agregar Usuario">
                </form>
        </div>
    </body>
</html>
