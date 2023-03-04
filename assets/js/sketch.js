'use strict';

let brush, color_brush, size;
let width = 800;
let high = 700;

function setup() {
    cursor('default');
    let lienzo = createCanvas(width, high);
    lienzo.parent('contenedor-canvas');
    background(0);
    //textFont('Montserrat');
}

//Inicio draw()
function draw() {

    // Programa de Dibujo
    textSize(20);
    textAlign(CENTER);
    fill(0, 150, 150);
    text("Programa de Dibujo", width / 2, 30);

    // brush
    textSize(16);
    textAlign(LEFT);
    fill(255);
    text("brush", 110, 70);

    // CD BRUSH
    noStroke();
    fill(150, 40);
    ellipse(50, 100, 6, 6);
    ellipse(48, 98, 8, 8);
    ellipse(46, 96, 12, 12);

    // CUADRADO SOBRE CUADRADO
    for (let i = 2; i <= 4; i += 2) {
        fill(150, 40);
        rect(80 + i * 5, 100 - i * 5, 25, 25);
    }

    // TRIANGULO
    fill(150, 40);
    triangle(140, 110, 160, 85, 180, 110);

    // ELIPSE SOBRE ELIPSE
    for (let i = 2; i <= 4; i += 2) {
        fill(150, 40);
        ellipse(200 + i * 5, 110 - i * 5, 25, 25);
    }

    // Tamaño
    textSize(16);
    textAlign(LEFT);
    fill(255);
    text("Tamaño", 390, 70);

    // Colores
    noStroke();
    fill(255, 0, 0);
    circle(410, 90, 10);
    fill(255, 255, 0);
    circle(430, 90, 10);
    fill(0, 0, 255);
    circle(450, 90, 10);
    fill(0, 255, 0);
    circle(410, 110, 10);
    fill(155, 0, 255);
    circle(430, 110, 10);
    fill(255, 117, 20);
    circle(450, 110, 10);

    // Goma de borrar
    noFill();
    stroke(255);
    circle(530, 100, 10);
    circle(560, 100, 20);
    circle(600, 100, 30);
    circle(650, 100, 40);
    circle(720, 100, 60);

    stroke(0, 150, 150);
    strokeWeight(4);
    fill(0, 0);
    rect(10, 140, width - 20, height - 150);

    if (mouseX > 10 && mouseY > 145 && mouseX < width - 10 && mouseY < height - 20) {
        if (mouseIsPressed) {
            if (mouseButton == LEFT) {
                let brushColor = [color(255, 0, 0, 50), color(255, 255, 0, 50), color(0, 0, 255, 50), color(0, 255, 0, 50), color(155, 0, 255, 50), color(255, 117, 20, 50), color(150, 50)];
                let selectedBrushColor = brushColor[floor(color_brush - 1)];
                let eraserColor = color(0);
                let fillColor = selectedBrushColor || eraserColor;
                fill(fillColor);
                stroke(selectedBrushColor || eraserColor);
                strokeWeight(selectedBrushColor ? 1 : 4);
            } else if (mouseButton == RIGHT) {
                fill(0);
                stroke(0);
            }
            let brushSize = [1, 2, 3, 4];
            let selectedBrushSize = brushSize[floor(size - 1)];
            let brush = {
                1: function () {
                    for (let i = 0; i <= selectedBrushSize * 3; i += 2) {
                        ellipse(mouseX - i + i, mouseY - i + i, i * i, i * i);
                    }
                },
                2: function () {
                    for (let i = 2; i <= selectedBrushSize * 5; i += 2) {
                        rect(mouseX + i * 5, mouseY - i * 5, selectedBrushSize * 10, selectedBrushSize * 10);
                    }
                }
            };
            brush[selectedBrushSize]();
        }
    }
}//Fin draw()

//Coordenadas para los pinceles 1, 2, 3 y 4
let brushes = [
    { x: 44, y: 94, size: 3, color: 0, type: 1 },
    { x: 90, y: 90, size: 3, color: 0, type: 2 },
    { x: 140, y: 85, size: 3, color: 0, type: 3 },
    { x: 200, y: 80, size: 3, color: 0, type: 4 },
];

//Coordenadas para los tamaños 1, 2, 3 y 4
let sizes = [
    { x: 295, y: 95, size: 1 },
    { x: 314, y: 94, size: 2 },
    { x: 333, y: 93, size: 3 },
    { x: 355, y: 92, size: 4 },
];

//Coordenadas para los colores 1, 2, 3, 4, 5 y 6
let colors = [
    { x: 405, y: 85, color: 1 }, //Rojo
    { x: 425, y: 85, color: 2 }, //Amarillo
    { x: 445, y: 85, color: 3 }, //Azul
    { x: 405, y: 105, color: 4 }, //Verde
    { x: 425, y: 105, color: 5 }, //Violeta
    { x: 445, y: 105, color: 6 }, //Naranja
    { x: 525, y: 95, color: 7 } //Negro (goma de borrar)
];

//Coordenadas para las gomas de borrar del 1 al 5
let erasers = [
    { x: 525, y: 95, size: 1.1 },
    { x: 550, y: 90, size: 1.2 },
    { x: 585, y: 85, size: 1.3 },
    { x: 630, y: 80, size: 1.4 },
    { x: 690, y: 70, size: 1.5 },
];

function mousePressed() {
    for (let i = 0; i < brushes.length; i++) {
        let brush = brushes[i];
        if (mouseX > brush.x && mouseX < brush.x + 12 && mouseY > brush.y && mouseY < brush.y + 12) {
            brush.selected = true;
            size = brush.size;
            color_brush = brush.color;
            brush_type = brush.type;
        } else {
            brush.selected = false;
        }
    }

    for (let i = 0; i < sizes.length; i++) {
        let s = sizes[i];
        if (mouseX > s.x && mouseX < s.x + 10 && mouseY > s.y && mouseY < s.y + 10) {
            size = s.size;
        }
    }

    for (let i = 0; i < colors.length; i++) {
        let c = colors[i];
        if (mouseX > c.x && mouseX < c.x + 10 && mouseY > c.y && mouseY < c.y + 10) {
            color_brush = c.color;
        }
    }

    for (let i = 0; i < erasers.length; i++) {
        let e = erasers[i];
        if (mouseX > e.x && mouseX < e.x + 10 && mouseY > e.y && mouseY < e.y + 10) {
            erasers = e.erasers;
        }
    }
}

function mouseMoved() {
    const pinceles = [
        { x1: 32, x2: 68, y1: 82, y2: 118 },
        { x1: 90, x2: 125, y1: 80, y2: 115 },
        { x1: 140, x2: 180, y1: 85, y2: 105 },
        { x1: 200, x2: 230, y1: 80, y2: 110 }
    ];

    const tamaños = [
        { x1: 295, x2: 305, y1: 95, y2: 105 },
        { x1: 314, x2: 326, y1: 94, y2: 106 },
        { x1: 333, x2: 347, y1: 93, y2: 107 },
        { x1: 355, x2: 371, y1: 92, y2: 108 }
    ];

    const colores = [
        { x1: 405, x2: 415, y1: 85, y2: 95 },
        { x1: 425, x2: 435, y1: 85, y2: 95 },
        { x1: 445, x2: 455, y1: 85, y2: 95 },
        { x1: 405, x2: 415, y1: 105, y2: 115 },
        { x1: 425, x2: 435, y1: 105, y2: 115 },
        { x1: 445, x2: 455, y1: 105, y2: 115 }
    ];

    const gomasDeBorrar = [
        { x1: 525, x2: 535, y1: 95, y2: 105 },
        { x1: 550, x2: 570, y1: 90, y2: 110 },
        { x1: 585, x2: 615, y1: 85, y2: 115 },
        { x1: 630, x2: 670, y1: 80, y2: 120 },
        { x1: 690, x2: 750, y1: 70, y2: 130 }
    ];

    for (const pincel of pinceles) {
        if (mouseX > pincel.x1 && mouseX < pincel.x2 && mouseY > pincel.y1 && mouseY < pincel.y2) {
            cursor(HAND);
            return;
        }
    }

    for (const tamaño of tamaños) {
        if (mouseX > tamaño.x1 && mouseX < tamaño.x2 && mouseY > tamaño.y1 && mouseY < tamaño.y2) {
            cursor(HAND);
            return;
        }
    }

    for (const color of colores) {
        if (mouseX > color.x1 && mouseX < color.x2 && mouseY > color.y1 && mouseY < color.y2) {
            cursor(HAND);
            return;
        }
    }

    for (const gomaDeBorrar of gomasDeBorrar) {
        if (mouseX > gomaDeBorrar.x1 && mouseX < gomaDeBorrar.x2 && mouseY > gomaDeBorrar.y1 && mouseY < gomaDeBorrar.y2) {
            cursor(HAND);
            return;
        }
    }
}