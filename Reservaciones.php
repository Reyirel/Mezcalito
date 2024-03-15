<HTML lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.46">
    <meta charset="UTF-8">
    <link rel="stylesheet" typw="text/css" href="diseno/estilo.css">
    <script defer src="js/enviarRervacion.js"></script> <!--Paea hacer la conexicion la base de datos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <?php
    include 'php/consultaarea.php';
    ?>
</head>

<body>
    <section class="reserva">

        <script src="js/reservEfeccts.js"></script>
        <script defer src="js/selecMesa.js"></script>
        <script defer src="js/mostrarAreaimg.js"></script>


        <DIV class="card">
            <div class="lines"><!--Efecto graddiant contorno-->
                <div class="fondocompleto">

                    <div class="datosCliente">
                        <form id="formularioReservacion" action="php/enviarform.php" method="post">

                            <div class="formularioCliente">
                                <div class="field-subtitulo">
                                    <h2><span class="spanPaparpadeo1">I</span>ngres<span class="spanPaparpadeo2">a</span>
                                        tus dat<span class="spanPaparpadeo3">o</span>s</h2>
                                </div>
                                <div class="form-field">
                                    <p>Nombre: </p>
                                    <input type="text" id="inputNombre" name="inputNombre" required />
                                </div>

                                <div class="form-field">
                                    <p>Telefono: </p>
                                    <input type="text" id="inputTelefono" name="inputTelefono" placeholder="Whatsapp" required />
                                </div>

                            </div>
                            <div class="formularioCliente">
                                <div class="field-subtitulo">
                                    <h2>Se<span class="spanPaparpadeo3">l</span><span class="spanPaparpadeo2">e</span>cc<span class="spanPaparpadeo4">i</span>ona
                                        tu <span class="spanPaparpadeo5">á</span>rea</h2>
                                </div>
                                <div class="form-field" id="preguntaMesa">
                                    <p>¿Con cuántas personas vendrán?: </p>
                                    <select class="selectMesa" id="inputPersonas" name="inputPersonas" required>
                                        <option value="1">1 a 4</option>
                                        <option value="2">5 a 8</option>
                                        <option value="3">9 a 12</option>
                                        <option value="4">13 a 16</option>
                                        <option value="5">17 a 20</option>
                                    </select>
                                </div>
                                <div class="form-field" id="preguntaMesa">
                                    <p id="mensajeNumeroMesas">Limite de 1 mesa en tu reserva</p>
                                </div>
                                <div class="form-field" id="preguntaMesa">
                                    <select class="selectMesaOP" id="OpcionesMesa1" name="OpcionesMesa1" required>
                                        <option value="0">Áreas disponibles</option>
                                        <option value="1">A01</option>
                                        <option value="2">A02</option>
                                        <option value="3">A03</option>
                                        <option value="4">A04</option>
                                        <option value="5">A05</option>
                                        <option value="6">A06</option>
                                        <option value="7">A07</option>
                                    </select>
                                </div>
                            </div>
                            <div class="formularioCliente">
                                <div class="field-subtitulo">
                                    <h2>H<span class="spanPaparpadeo4">a</span>z t<span class="spanPaparpadeo1">u</span>
                                        res<span class="spanPaparpadeo3">e</span>rvaci<span class="spanPaparpadeo5">ó</span>n</h2>
                                </div>

                                <div class="form-field">
                                    <p>Fecha: </p>
                                    <input type="date" id="inputDate" name="inputDate" required />
                                </div>

                                <div class="form-field">
                                    <p>Hora: </p>
                                    <input type="time" id="inputTime" name="inputTime" min="09:00" max="22:00" required />
                                </div>
                                <div class="form-field">

                                    <div class="solicitarRedesSociales">
                                        <p class="redMSJ">¿Quieres que te sigamos en redes sociales?</p>
                                        <p>(Opcional)</p>
                                        <p class="redesSociales">
                                            <a class="fa fa-facebook"></a>
                                            <input type="text" class="inputFACE" name="inputFACE" placeholder="facebook.com/username" />
                                            <a class="fa fa-instagram"></a>
                                            <input type="text" class="inputINSTA" name="inputINSTA" placeholder="@username" />
                                        </p>

                                    </div>

                                </div>

                                <div class="form-field">
                                    <div class="aceptarTerminos">
                                        <div class="aceptarTerminos1">Acepto los términos y condiciones
                                        </div>
                                        <div class="aceptarTerminos2">
                                            <button class="verTerminos"></button>
                                        </div>
                                        <div class="aceptarTerminos3">
                                            <input class="form-check-input2" type="checkbox" id="star-checkbox2">
                                            <label class="form-check-label2" for="star-checkbox2">
                                                <span class="starCheck2"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="BTNreservar">
                                        <button type="submit" id="botonReservar" class="glitchbuttonRev" disabled>Reservar</button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>

                    <div class="seleccionMesa">

                        <div class="Imagenesmesas">

                            <div class="mesaTitulo1">
                                Selecciona <space class="spaceTU">tu</space>Área
                            </div>

                            <div class="AreaUsableMesas">
                                <div class="areaArriba">
                                    <div class="Area01" id="Area01">
                                        <div class="MSJAreaSelec">
                                            <div id="Seleccionado1" hidden>A01 SELECCIONADA</div>
                                        </div>
                                        <button class="VisualizarArea" id="verA1"></button>

                                        <div class="divMesaselect" id="q1">
                                            <p>A01</p>
                                            <button class="botonDeMesa" id="btnmesa1">
                                                <img src="diseno/imagesResev/mesa.png" hidden></img>
                                            </button>
                                        </div>
                                    </div>



                                    <div class="Area02" id="Area02">
                                        <div class="MSJAreaSelec">
                                            <div id="Seleccionado2" hidden>A02 SELECCIONADA</div>
                                        </div>
                                        <button class="VisualizarArea" id="verA2"></button>

                                        <div class="divMesaselect" id="q2">
                                            <p>A02</p>
                                            <button class="botonDeMesa" id="btnmesa2">
                                                <img src="diseno/imagesResev/mesa.png" hidden></img>
                                            </button>
                                        </div>
                                    </div>


                                    <div class="Area03" id="Area03">
                                        <div class="MSJAreaSelec">
                                            <div id="Seleccionado3" hidden>A03 SELECCIONADA</div>
                                        </div>
                                        <button class="VisualizarArea" id="verA3"></button>

                                        <div class="divMesaselect" id="q3">
                                            <p>A03</p>
                                            <button class="botonDeMesa" id="btnmesa3">
                                                <img src="diseno/imagesResev/mesa.png" hidden></img>
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="Areaabajo">
                                    <div class="Area04" id="Area04">
                                        <div class="MSJAreaSelec">
                                            <div id="Seleccionado4" hidden>A04 SELECCIONADA</div>
                                        </div>
                                        <button class="VisualizarArea" id="verA4"></button>

                                        <div class="divMesaselect" id="q4">
                                            <p>A04</p>
                                            <button class="botonDeMesa" id="btnmesa4">
                                                <img src="diseno/imagesResev/mesa.png" hidden></img>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="AreaEntrada">
                                    </div>

                                    <div class="Areaabajoderecho">

                                        <div class="Areaabajoderechotop">
                                            <div class="Area05" id="Area05">
                                                <div class="MSJAreaSelec">
                                                    <div id="Seleccionado5" hidden>A05 SELECCIONADA</div>
                                                </div>
                                                <button class="VisualizarArea" id="verA5"></button>

                                                <div class="divMesaselect" id="q5">
                                                    <p>A05</p>
                                                    <button class="botonDeMesa" id="btnmesa5">
                                                        <img src="diseno/imagesResev/mesa.png" hidden></img>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="Area06" id="Area06">
                                                <div class="MSJAreaSelec">
                                                    <div id="Seleccionado6" hidden>A06 SELECCIONADA</div>
                                                </div>
                                                <button class="VisualizarArea" id="verA6"></button>

                                                <div class="divMesaselect" id="q6">
                                                    <p>A06</p>
                                                    <button class="botonDeMesa" id="btnmesa6">
                                                        <img src="diseno/imagesResev/mesa.png" hidden></img>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="Areaabajoderechobottom">
                                            <div class="Area07" id="Area07">
                                                <div class="MSJAreaSelec">
                                                    <div id="Seleccionado7" hidden>A07 SELECCIONADA</div>
                                                </div>
                                                <button class="VisualizarArea" id="verA7"></button>

                                                <div class="divMesaselect" id="q7">
                                                    <p>A07</p>
                                                    <button class="botonDeMesa" id="btnmesa7">
                                                        <img src="diseno/imagesResev/mesa.png" hidden></img>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="areaAbrir">
                            <button id="cerrar"></button>
                            <div class="aA1">
                                <img src="diseno/imagesAreas/A1.jpg"></img>
                            </div>
                            <div class="aA2">
                                <img src="diseno/imagesAreas/A2.jpg"></img>
                            </div>
                            <div class="aA3">
                                <img src="diseno/imagesAreas/A3.jpg"></img>
                            </div>
                            <div class="aA4">
                                <img src="diseno/imagesAreas/A4.jpg"></img>
                            </div>
                            <div class="aA5">
                                <img src="diseno/imagesAreas/A5.jpg"></img>
                            </div>
                            <div class="aA6">
                                <img src="diseno/imagesAreas/A6.jpg"></img>
                            </div>
                            <div class="aA7">
                                <img src="diseno/imagesAreas/A7.jpg"></img>
                            </div>
                        </div>
                    </div>
                    <div class="MensajeDeEnvioReveracion1">
                        <div class="MensajeDeEnvioReveracion2">
                            <center>
                                <h1>Envio Éxitoso.</h1>
                            </center>
                        </div>
                        <div class="MensajeDeEnvioReveracion3">
                            Por favor, espera y mantente pendiente de tu telefono para confirmar tu reservación.
                            <br>
                            De esta manera, nos aseguramos de que todo esté en orden y puedas disfrutar de tu
                            experiencia
                            sin ningún contratiempo.
                            ¡Gracias por confiar en nosotros!
                            <br><br>
                            Atte. El Mezcalito.
                        </div>
                        <div class="MensajeDeEnvioReveracion4">
                            <a class="whatsapp" href="https://web.whatsapp.com/"></a>
                        </div>
                    </div>
                </div>
            </div>
        </DIV>
    </section>
</body>

</HTML>