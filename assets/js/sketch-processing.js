// 'use strict';

//Variables globales 
let pincel, color_pincel, size;
let width = 800; hight = 800;
let white = 255; black = 0;

const circles = [
    { x: 300, y: 100, d: 10 },
    { x: 320, y: 100, d: 12 },
    { x: 340, y: 100, d: 14 },
    { x: 363, y: 100, d: 16 }
]

function setup() {
    //Configuración del canvas
    cursor('default');
    let lienzo = createCanvas(width, hight);
    lienzo.parent('contenedor-canvas');
    background(0);
}

function draw() {

    //PINCELES
    fill(150, 40);
    stroke(0);
    //Pincel 1 CD BRUSH
    for (let i = 0; i <= 6; i += 2) {
        ellipse(50 - i + i, 100 - i + i, i * i, i * i);
    }

    //Pincel 2 CUADRADO SOBRE CUADRADO
    for (let i = 2; i <= 4; i += 2) {
        rect(80 + i * 5, 100 - i * 5, 25, 25);
    }

    //Pincel 3 TRIANGULO
    { triangle(160 - 20, 95 + 15, 160, 95 - 10, 160 + 20, 95 + 15); }

    //Pincel 4 ELIPSE SOBRE ELIPSE
    for (let i = 2; i <= 4; i += 2) {
        ellipse(200 + i * 5, 110 - i * 5, 25, 25);
    }

    //TAMAÑOS
    fill(black);
    strokeWeight(1);
    stroke(white);
    for (const circulo of circles) {
        circle(circulo.x, circulo.y, circulo.d)
        //return;
    }

    //COLORES
    //Rojo
    stroke(0);
    fill(255, 0, 0);
    circle(410, 90, 10);

    //Amarillo
    fill(255, 255, 000);
    circle(430, 90, 10);

    //Azul
    fill(0, 0, 255);
    circle(450, 90, 10);

    //Verde
    fill(0, 255, 0);
    circle(410, 110, 10);

    //Violeta
    fill(155, 0, 255);
    circle(430, 110, 10);

    //Naranja
    fill(255, 117, 020);
    circle(450, 110, 10);


    //GOMA TAMAÑO
    //Tamaño 1
    stroke(255);
    fill(0);
    circle(530, 100, 10);

    //Tamaño 2
    stroke(255);
    fill(0);
    circle(560, 100, 20);

    //Tamaño 3
    stroke(255);
    fill(0);
    circle(600, 100, 30);

    //Tamaño 4
    stroke(255);
    fill(0);
    circle(650, 100, 40);

    //Tamaño 5
    stroke(255);
    fill(0);
    circle(720, 100, 60);

    /* DIBUJO CANVAS
    con borde de color verde azulado, grosor de borde 4, relleno del
    canvas negro translucido, para dibujar directamente sobre el FONDO de pantalla,
    el canvas es de tamaño 779x520 y comienza en 10 de x y 140 de y
    */
    stroke(0, 150, 150);
    strokeWeight(4);
    fill(0, 0);
    rect(10, 140, 779, 520);

    //Guardar Canvas

}

function mouseMoved() {

    //PINCELES
    const pinceles = [
        { x1: 32, x2: 68, y1: 82, y2: 118 },
        { x1: 90, x2: 125, y1: 80, y2: 115 },
        { x1: 140, x2: 180, y1: 85, y2: 105 },
        { x1: 200, x2: 230, y1: 80, y2: 110 }
    ]

    for (const pincel of pinceles) {
        if (mouseX > pincel.x1 && mouseX < pincel.x2 && mouseY > pincel.y1 && mouseY < pincel.y2) {
            console.log(`${pincel}: ${pinceles[pincel]}`)
            cursor(HAND);
            return;
        }
    }

    //TAMAÑOS
    if ((mouseX > 295) && (mouseX < 305) && (mouseY > 95) && (mouseY < 105)) { cursor(HAND); }
    else if ((mouseX > 314) && (mouseX < 326) && (mouseY > 94) && (mouseY < 106)) { cursor(HAND); }
    else if ((mouseX > 333) && (mouseX < 347) && (mouseY > 93) && (mouseY < 107)) { cursor(HAND); }
    else if ((mouseX > 355) && (mouseX < 371) && (mouseY > 92) && (mouseY < 108)) { cursor(HAND); }

    //COLORES
    else if ((mouseX > 405) && (mouseX < 415) && (mouseY > 85) && (mouseY < 95)) { cursor(HAND); }
    else if ((mouseX > 425) && (mouseX < 435) && (mouseY > 85) && (mouseY < 95)) { cursor(HAND); }
    else if ((mouseX > 445) && (mouseX < 455) && (mouseY > 85) && (mouseY < 95)) { cursor(HAND); }
    else if ((mouseX > 405) && (mouseX < 415) && (mouseY > 105) && (mouseY < 115)) { cursor(HAND); }
    else if ((mouseX > 425) && (mouseX < 435) && (mouseY > 105) && (mouseY < 115)) { cursor(HAND); }
    else if ((mouseX > 445) && (mouseX < 455) && (mouseY > 105) && (mouseY < 115)) { cursor(HAND); }

    //GOMAS DE BORRAR
    else if ((mouseX > 525) && (mouseX < 535) && (mouseY > 95) && (mouseY < 105)) { cursor(HAND); }
    else if ((mouseX > 550) && (mouseX < 570) && (mouseY > 90) && (mouseY < 110)) { cursor(HAND); }
    else if ((mouseX > 585) && (mouseX < 615) && (mouseY > 85) && (mouseY < 115)) { cursor(HAND); }
    else if ((mouseX > 630) && (mouseX < 670) && (mouseY > 80) && (mouseY < 120)) { cursor(HAND); }
    else if ((mouseX > 690) && (mouseX < 750) && (mouseY > 70) && (mouseY < 130)) { cursor(HAND); }
    else { cursor(ARROW); }
}

function mousePressed() {
    //PINCELES

    //Coordenadas de Pincel 1
    if ((mouseX > 44) && (mouseX < 56) && (mouseY > 94) && (mouseY < 106)) {
        pincel = 1;
        size = 3;
        color_pincel = 0;
    }//Fin condicional

    //Coordenadas de Pincel 2
    if ((mouseX > 90) && (mouseX < 125) && (mouseY > 90) && (mouseY < 110)) {
        pincel = 2;
        size = 3;
        color_pincel = 0;
    }//Fin condicional

    //Coordenadas de Pincel 3
    if ((mouseX > 140) && (mouseX < 180) && (mouseY > 85) && (mouseY < 105)) {
        pincel = 3;
        size = 3;
        color_pincel = 0;
    }//Fin condicional

    //Coordenadas de Pincel 4

    if ((mouseX > 200) && (mouseX < 230) & (mouseY > 80) && (mouseY < 110)) {
        pincel = 4;
        size = 3;
        color_pincel = 0;
    }//Fin condicional

    //TAMAÑOS

    //Coordenadas de Tamaño 1
    if ((mouseX > 295) && (mouseX < 305) && (mouseY > 95) && (mouseY < 105)) {
        size = 1;
    }//Fin condicional

    //Coordenadas de Tamaño 2
    if ((mouseX > 314) && (mouseX < 326) && (mouseY > 94) && (mouseY < 106)) {
        size = 2;
    }//Fin condicional

    //Coordenadas de Tamaño 3
    if ((mouseX > 333) && (mouseX < 347) && (mouseY > 93) && (mouseY < 107)) {
        size = 3;
    }//Fin condicional

    //Coordenadas de Tamaño 4
    if ((mouseX > 355) && (mouseX < 371) && (mouseY > 92) && (mouseY < 108)) {
        size = 4;
    }//Fin condicional

    //COLORES

    //Coordenadas de color ROJO
    if ((mouseX > 405) && (mouseX < 415) && (mouseY > 85) && (mouseY < 95)) {
        color_pincel = 1;
    }//Fin condicional de color Rojo

    //Coordenadas de color AMARILLO
    if ((mouseX > 425) && (mouseX < 435) && (mouseY > 85) && (mouseY < 95)) {
        color_pincel = 2;
    }

    //Coordenadas de color AZUL
    if ((mouseX > 445) && (mouseX < 455) && (mouseY > 85) && (mouseY < 95)) {
        color_pincel = 3;
    }

    //Coordenadas de color VERDE
    if ((mouseX > 405) && (mouseX < 415) && (mouseY > 105) && (mouseY < 115)) {
        color_pincel = 4;
    }

    //Coordenadas de color VIOLETA
    if ((mouseX > 425) && (mouseX < 435) && (mouseY > 105) && (mouseY < 115)) {
        color_pincel = 5;
    }

    //Coordenadas de color NARANJA
    if ((mouseX > 445) && (mouseX < 455) && (mouseY > 105) && (mouseY < 115)) {
        color_pincel = 6;
    }
    //Coordenadas de color NEGRO
    if ((mouseX > 525) && (mouseX < 535) && (mouseY > 95) && (mouseY < 105)) {
        color_pincel = 1.1;
    }

    //GOMA DE BORRAR 

    //Coordenadas Goma de Borrar 1
    if ((mouseX > 525) && (mouseX < 535) && (mouseY > 95) && (mouseY < 105)) {
        pincel = 1.1;
        color_pincel = 1.1;
    }

    //Coordenadas Goma de Borrar 2
    if ((mouseX > 550) && (mouseX < 570) && (mouseY > 90) && (mouseY < 110)) {
        pincel = 1.2;
        color_pincel = 1.1;
    }

    //Coordenadas Goma de Borrar 3
    if ((mouseX > 585) && (mouseX < 615) && (mouseY > 85) && (mouseY < 115)) {
        pincel = 1.3;
        color_pincel = 1.1;
    }

    //Coordenadas Goma de Borrar 4
    if ((mouseX > 630) && (mouseX < 670) && (mouseY > 80) && (mouseY < 120)) {
        pincel = 1.4;
        color_pincel = 1.1;
    }

    //Coordenadas Goma de Borrar 5
    if ((mouseX > 690) && (mouseX < 750) && (mouseY > 70) && (mouseY < 130)) {
        pincel = 1.5;
        color_pincel = 1.1;
    }
}

function mouseDragged() {
    if ((mouseX > 10) && (mouseY > 145) && (mouseX < 790) && (mouseY < 660)) {
        console.log('Estamos dentro del lienzo')
        if (mouseButton == LEFT) {
            console.log('Hicimos click con el botón izquierdo del mouse dentro del lienzo')

            fill(150, 50);
            strokeWeight(1);

            //ROJO
            if (color_pincel == 1) {
                fill(255, 0, 0, 50);
                stroke(255, 0, 0);
            }
            //AMARILLO
            else if (color_pincel == 2) {
                fill(255, 255, 0, 50);
                stroke(255, 255, 0);
            }
            //AZUL
            else if (color_pincel == 3) {
                fill(0, 0, 255, 50);
                stroke(0, 0, 255);
            }
            //VERDE
            else if (color_pincel == 4) {
                fill(0, 255, 0, 50);
                stroke(0, 255, 0);
            }
            //VIOLETA
            else if (color_pincel == 5) {
                fill(155, 0, 255, 50);
                stroke(155, 0, 255);
            }
            //NARANJA
            else if (color_pincel == 6) {
                fill(255, 117, 020, 50);
                stroke(255, 117, 020);
            }
            //NEGRO GOMA DE BORRAR
            else if (color_pincel == 1.1) {
                fill(0);
                stroke(0);
            }
            //Color por default
            else if (color_pincel == 0) {
                //Rellenar la figura con un gris transparente
                fill(150, 50);
                //Borde Negro Opaco de grosor 1
                stroke(0);
                strokeWeight(1);
            }
        }
        else if (mouseButton == RIGHT) {
            fill(0);
            stroke(0);
        }
        else {
            noFill();
            noStroke();
        }
        //PINCELES
        //Pincel 1 con 4 tamaños, el tamaño 3 viene por default
        if (pincel == 1) {
            if (size == 1) {
                for (let i = 0; i <= 2; i += 2) {
                    ellipse(mouseX - i + i, mouseY - i + i, i * i, i * i);
                }
            }

            else if (size == 2) {
                for (let i = 0; i <= 4; i += 2) {
                    ellipse(mouseX - i + i, mouseY - i + i, i * i, i * i);
                }
            }
            //Tamaño por default
            else if (size == 3) {
                for (let i = 0; i <= 6; i += 2) {
                    ellipse(mouseX - i + i, mouseY - i + i, i * i, i * i);
                }
            }
            else if (size == 4) {
                for (let i = 0; i <= 8; i += 2) {
                    ellipse(mouseX - i + i, mouseY - i + i, i * i, i * i);
                }
            }

        }
        //Pincel 2 con 4 tamaños, el tamaño 3 viene por default              
        else if (pincel == 2) {
            if (size == 1) {
                for (let i = 2; i <= 4; i += 2) {
                    rect(mouseX + i * 5, mouseY - i * 5, 10, 10);
                }//Fin del bloque de código a ejecutar del for
            }

            else if (size == 2) {
                for (let i = 2; i <= 4; i += 2) {
                    rect(mouseX + i * 5, mouseY - i * 5, 20, 20);
                }//Fin del bloque de código a ejecutar del for
            }
            //Tamaño por default
            else if (size == 3) {
                for (let i = 2; i <= 4; i += 2) {
                    rect(mouseX + i * 5, mouseY - i * 5, 30, 30);
                }//Fin del bloque de código a ejecutar del for
            }
            else if (size == 4) {
                for (let i = 2; i <= 4; i += 2) {
                    rect(mouseX + i * 5, mouseY - i * 5, 40, 40);
                }//Fin del bloque de código a ejecutar del for
            }

        }
        //Pincel 3 con 4 tamaños, el tamaño 3 viene por default            
        else if (pincel == 3) {
            if (size == 1) {
                triangle(mouseX - 10, mouseY + 5, mouseX, mouseY - 5, mouseX + 10, mouseY + 10);
            }

            else if (size == 2) {
                triangle(mouseX - 15, mouseY + 10, mouseX, mouseY - 5, mouseX + 15, mouseY + 10);
            }
            //Tamaño por default
            else if (size == 3) {
                triangle(mouseX - 20, mouseY + 15, mouseX, mouseY - 10, mouseX + 20, mouseY + 15);
            }
            else if (size == 4) {
                triangle(mouseX - 25, mouseY + 20, mouseX, mouseY - 15, mouseX + 25, mouseY + 20);
            }
            //Pincel 4 con 4 tamaños, el tamaño 3 viene por default                
        }
        else if (pincel == 4) {
            if (size == 1) {
                for (let i = 2; i <= 4; i += 2) {
                    ellipse(mouseX + i * 5, mouseY - i * 5, 10, 10);
                }//Fin del bloque de código del for
            }

            else if (size == 2) {
                for (let i = 2; i <= 4; i += 2) {
                    ellipse(mouseX + i * 5, mouseY - i * 5, 20, 20);
                }//Fin del bloque de código del for
            }
            //Tamaño por default
            else if (size == 3) {
                for (let i = 2; i <= 4; i += 2) {
                    ellipse(mouseX + i * 5, mouseY - i * 5, 30, 30);
                }//Fin del bloque de código del for
            }
            else if (size == 4) {
                for (let i = 2; i <= 4; i += 2) {
                    ellipse(mouseX + i * 5, mouseY - i * 5, 40, 40);
                }//Fin del bloque de código del for
            }
            //Pinceles para la GOMA DE BORRAR                
        }
        else if (pincel == 1.1) {
            noStroke();
            circle(mouseX, mouseY, 10);
        }

        else if (pincel == 1.2) {
            noStroke();
            circle(mouseX, mouseY, 20);
        }

        else if (pincel == 1.3) {
            noStroke();
            circle(mouseX, mouseY, 30);
        }

        else if (pincel == 1.4) {
            noStroke();
            circle(mouseX, mouseY, 40);
        }

        else if (pincel == 1.5) {
            noStroke();
            circle(mouseX, mouseY, 60);
        }

        else {
            noStroke();
            circle(mouseX, mouseY, 20);
        }
    }
}

function saveCanvas() {
    //Almacenamiento del canvas
    saveCanvas(lienzo, 'canvasColaborativo', 'jpg');
}