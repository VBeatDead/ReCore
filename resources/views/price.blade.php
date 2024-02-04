<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <title>BIRTHDAY</title>
    <style>
        body {
            background: #020202;
        }

        .petasan {
            cursor: crosshair;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .petasan canvas {
            display: block
        }

        .petasan h1 {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-family: "Source Sans Pro";
            font-size: 5em;
            font-weight: 900;
            -webkit-user-select: none;
            user-select: none;
        }

        @import url('https://fonts.googleapis.com/css?family=Indie+Flower');
        @import url('https://fonts.googleapis.com/css?family=Amatic+SC');

        .ucapan {
            font-family: 'Indie Flower', cursive !important;
            background: #FDE3A7;
            position: absolute;
            z-index: 1;
            top: 65%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .ucapan ::selection {
            background: transparent;
        }

        .ucapan h4 {
            font-size: 26px;
            line-height: 1px;
            font-family: 'Amatic SC', cursive !important;
        }

        .color1 {
            color: #1BBC9B
        }

        .color2 {
            color: #C0392B
        }

        .card {
            color: #013243;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300px;
            height: 400px;
            background: #e0e1dc;
            transform-style: preserve-3d;
            transform: translate(-50%, -50%) perspective(2000px);
            box-shadow: inset 300px 0 50px rgba(0, 0, 0, .5), 20px 0 60px rgba(0, 0, 0, .5);
            transition: 1s;
        }

        .card:hover {
            transform: translate(-50%, -50%) perspective(2000px) rotate(15deg) scale(1.2);
            box-shadow: inset 20px 0 50px rgba(0, 0, 0, .5), 0 10px 100px rgba(0, 0, 0, .5);
        }

        .card:before {
            content: '';
            position: absolute;
            top: -5px;
            left: 0;
            width: 100%;
            height: 5px;
            background: #BAC1BA;
            transform-origin: bottom;
            transform: skewX(-45deg);
        }

        .card:after {
            content: '';
            position: absolute;
            top: 0;
            right: -5px;
            width: 5px;
            height: 100%;
            background: #92A29C;
            transform-origin: left;
            transform: skewY(-45deg);
        }

        .card .imgBox {
            width: 100%;
            height: 100%;
            position: relative;
            transform-origin: left;
            transition: .7s;
        }

        .card .bark {
            position: absolute;
            background: #e0e1dc;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: .7s;
        }

        .card .imgBox img {
            min-width: 250px;
            max-height: 400px;
        }

        .card:hover .imgBox {
            transform: rotateY(-135deg);
        }

        .card:hover .bark {
            opacity: 1;
            transition: .6s;
            box-shadow: 300px 200px 100px rgba(0, 0, 0, .4) inset;
        }

        .card .details {
            position: absolute;
            top: 0;
            left: 0;
            box-sizing: border-box;
            padding: 0 0 0 10px;
            z-index: -1;
            margin-top: 70px;
        }

        .card .details p {
            font-size: 15px;
            line-height: 5px;
            transform: rotate(-10deg);
            padding: 0 0 0 20px;
        }

        .card .details h4 {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        /* !!BEBEK!! */
        .bebek p,
        .bebek h1,
        .bebek h2,
        .bebek h3,
        .bebek h4 {
            display: inline-block;
            margin-block-start: 0em;
            margin-block-end: 0em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 0px;
        }

        .wrapper {
            position: fixed;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            top: 0;
            z-index: index -1;
        }

        .duck *,
        .duckling * {
            background-size: calc(var(--w) * var(--m)) calc(var(--h) * var(--m)) !important;
            background-repeat: no-repeat !important;
            image-rendering: pixelated;
        }

        .duck,
        .duckling {
            position: absolute;
            transition: 1s;
            --w: 20;
            --h: 14;
            --m: 2px;
            --neck-w: 16;
            width: calc(var(--w) * var(--m));
            height: calc(var(--h) * var(--m));
            --color: #fff;
            --dark-yellow: #fcc85b;
        }

        .body {
            position: absolute;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAOCAYAAAAvxDzwAAAAAXNSR0IArs4c6QAAAFRJREFUOE9jZMAC/v///x+bOLoYIyMjI4YYsgCxBuEzGG4DuYbBDIe5FmwgpYYhG0p9A6nlOrgrR6CBgz+WYbFDaeSgJGxKDUXO0xiZm5QwxVY4AADV9Tf/s/CuJAAAAABJRU5ErkJggg==);
            width: calc(var(--w) * var(--m));
            height: calc(var(--h) * var(--m));
        }

        .tail {
            position: absolute;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAAHCAYAAAArkDztAAAAAXNSR0IArs4c6QAAAC1JREFUGFdjZICC/////wcxGRkZGcE0iIAJwhSBJHFLoKuG68IpgdcOZEmYvQA6WRwAeFIlLwAAAABJRU5ErkJggg==);
            --w: 6;
            --h: 7;
            --x: calc(7 * var(--m));
            --y: calc(-2 * var(--m));
            width: calc(var(--w) * var(--m));
            height: calc(var(--h) * var(--m));
            transform: translate(var(--x), var(--y));
            transition: 1s;
            z-index: -10;
        }

        .up .tail {
            --y: calc(-2 * var(--m));
        }

        .right .tail {
            --x: calc(-2 * var(--m));
        }

        .down .tail {
            --y: calc(-4 * var(--m));
        }

        .left .tail {
            --x: calc(15 * var(--m));
        }


        .neck {
            position: absolute;
            background-color: --var(--color);
            width: calc(var(--neck-w) * 1px);
            height: calc(8 * var(--m));
            transition: 0.8s;
            bottom: 0;
        }

        .neck-base {
            position: absolute;
            width: calc(8 * var(--m));
            height: calc(8 * var(--m));
            --x: calc(6 * var(--m));
            --y: calc(2 * var(--m));
            transform: translate(var(--x), var(--y));
            transition: 0.3s;
            z-index: 2;
        }

        .up .neck-base {
            --y: calc(2 * var(--m));
        }

        .right .neck-base {
            --x: calc(10 * var(--m));
        }

        .down .neck-base {
            --y: calc(3 * var(--m));
        }

        .left .neck-base {
            --x: calc(2 * var(--m));
        }


        .head {
            position: absolute;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAF9JREFUOE/t1EsKACAIBUDf/Q9tRBhmf7FdLQPHUgsUvBDs0RRkZl4lAzCM7TZ3kE1i4Qa8xQTXaAW9mEU/6J9Kacy7GuazeTs9HBu57C26HGxdwR18/PT8bSmR4b9NAm06MBHW1BzVAAAAAElFTkSuQmCC);
            --w: 20;
            --h: 16;
            width: calc(var(--w) * var(--m));
            height: calc(var(--h) * var(--m));
            margin-top: calc(var(--h) * -2px + 4px);
            margin-left: calc(((var(--w) * 2) - var(--neck-w)) * -0.5px);
        }


        .down.left .head,
        .down.right .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIRJREFUOE9jZKAyYKSyeQw4Dfz///9/fJYxMjJi1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A0dYgZmmUowTDv9Amfk4pOHhSOKl6luICWJHMOFf05EYU3IzOZLCdqDkWxwGQYzCZ+hGAmbkGG4DMWb9QgZymKxjOhCBK4Ql6GkGAbyDQD+hEQRv/jlIAAAAABJRU5ErkJggg==);
        }

        .up.left .head,
        .up.right .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIFJREFUOE9jZICCPyei/sPYyDSLxTJGbOK4xMCKcRkG00SKoYzYDGM2X0rQUYyMjFhdjuFCYgxDtg3dYLgtIJeSahjMYGRD4Qb+//8fa6QQ9DtUAczQUQOJDTFMdbQPQ5Cd5MY01mQD8wSphuJM2OihQshgvFmP/KjAEjnUNAxkFgC13zgRXycP6gAAAABJRU5ErkJggg==);
        }

        .down .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAJZJREFUOE9jZKAyYKSyeQw4Dfz///9/fJYxMjJi1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A0dogZmmUowTDv9Am+KQlcDC0esXqa6geQkdgwXggxBj+m/J6Oxms1svhRFHGuygamAGYrLMJg6mKF4EzZM8Z8TUXizHUwdi8UyjJyGMy8TMhSbYSCL8JY2uAzFZRjIQAA6bUoRLru2rQAAAABJRU5ErkJggg==);
        }

        .up .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIFJREFUOE/t01EOgCAIBmBZ3anOUuers9SdajgfcGr8NNl6yzfH/BBBCsa6joW18DjvhI7BAMIEQqgKJmyYNuvy4T7XoKEPkJnVMmGJRJVRbXoxSUIFmkEv1qI/aE6KGZTGfPeGKb230+rYSD29aIklA/7lN7iF8jz626CfhDf0Joo7dzsRfj//OAAAAABJRU5ErkJggg==);
        }

        .left .head,
        .right .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIBJREFUOE9jZKAyYKSyeQw4Dfz///9/fJYxMjJi1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A0dOAOzTCUYpp1+gTOeYN4m2oUkG/jnRBTWZMJsvpSopIriQlyGwUwixlC4gYQMI8ZQjGRDyFB8LsSZsEkNQ6KzHlExgEcR1UsbAK27NhEDLz+RAAAAAElFTkSuQmCC);
        }

        .right .head {
            transform: scale(-1, 1);
        }

        .legs {
            position: absolute;
            display: flex;
            justify-content: space-between;
            width: calc(12 * var(--m));
            height: calc(7 * var(--m));
            left: calc(4 * var(--m));
            bottom: calc(-4 * var(--m));
            transition: 1s;
            z-index: -1;
            --angle: 180deg;
        }

        .leg {
            position: relative;
            background-color: var(--dark-yellow);
            width: var(--m);
            height: calc(7 * var(--m));
        }

        .leg:after {
            position: absolute;
            background-color: var(--dark-yellow);
            content: '';
            width: 4px;
            height: 7px;
            left: -1px;
            bottom: 0px;
            transform-origin: bottom center;
            transform: rotate(var(--angle));
        }

        .up .legs {
            --angle: 0deg;
        }

        .up.right .legs {
            --angle: 45deg;
        }

        .right .legs {
            --angle: 90deg;
        }

        .down.right .legs {
            --angle: 135deg;
        }

        .down .legs {
            --angle: 180deg;
        }

        .down.left .legs {
            --angle: 225deg;
        }

        .left .legs {
            --angle: 270deg;
        }

        .up.left .legs {
            --angle: 315deg;
        }

        .waddle .leg {
            animation: waddle 0.3s infinite;
        }

        .leg:nth-child(1) {
            --one: calc(7 * var(--m));
            --two: calc(4 * var(--m));
        }

        .leg:nth-child(2) {
            --one: calc(4 * var(--m));
            --two: calc(7 * var(--m));
        }

        @keyframes waddle {

            0%,
            100% {
                height: var(--one);
            }

            50% {
                height: var(--two);
            }
        }

        .left .legs,
        .right .legs {
            width: calc(10 * var(--m));
            left: calc(5 * var(--m));
        }

        .duckling-target {
            position: absolute;
            /* background-color: #fff945; */
            width: 12px;
            height: 12px;
            transition: 1.8s;
            border-radius: 50%;
        }

        /* duckling */

        .duckling {
            position: absolute;
            /* left: 200px; */
            --neck-w: 8;
            --m: 1px;
            --color: #fff04d;
            transition: 0.5s;
        }

        .duckling .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAGFJREFUOE9jZKAyYKSyeQw4Dfz/wfc/PssYBTZj1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A0dNZD8VAmLGNqFIcht5MY01mQD8yyphuJN2MghSMhgorMe+dEC0Un10gYAfowwEW4KJvUAAAAASUVORK5CYII=);
            margin-left: calc((var(--w) - var(--neck-w)) * -0.5px);
            margin-top: calc(var(--h) * -1px + 2px);
        }

        .duckling.down.left .head,
        .duckling.down.right .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIVJREFUOE9jZKAyYKSyeQw4Dfz/wfc/PssYBTZj1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A2lrYFZLqfAFk7bY4Y1PvDJw7yN4sLBbyAliRzDy39ORGFNyMwanwnag5FscBkGMwmfoRgJm5BhuAzFm/UIGcpisYzoQgSuEJehpBgG8g0Az0pNESONMLcAAAAASUVORK5CYII=);
        }

        .duckling.up.left .head,
        .duckling.up.right .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIFJREFUOE9jZICCPyei/sPYyDSLxTJGbOK4xMCKcRkG00SKoYzYDGPW+EzQUYwCm7G6HMOFxBiGbBu6wXBbQC4l1TCYwciGwg38/8EXa6QQ9DtUAczQUQOJDTFMdbQPQ5Cd5MY01mQD8wSphuJM2OihQshgvFmP/KjAEjnUNAxkFgDi4TsRTK7K8AAAAABJRU5ErkJggg==);
        }

        .duckling.down .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAJdJREFUOE9jZKAyYKSyeQw4Dfz/wfc/PssYBTZj1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A2lj4FZLqfAFk/bY4Y1XrDJw7yN1YWD30ByEjuGl0GGoMf03xu8WM1m1viMIo412cBUwAzFZRhMHcxQvAkbpvjPiSi82Q6mjsViGUZOw5mXCRmKzTCQRXhLG1yG4jIMZCAAfBdQEXRmcAUAAAAASUVORK5CYII=);
        }

        .duckling.up .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAIRJREFUOE9jZMAD/pyI+o9NmsViGSMubTglcBkGMwiXoVgNBBnGrPEZn+MZ/t7gZcBmKIaB/z/4YvUmTi8KbEYxA4VDqmEwSxiRDIUbSK5h6IaOGog3peCVhEUM7cIQZD25MY012cD8Q6qhyIaBzMCZlwkZjG4QPD2SHw3YdeJ0IbkWAQBsyTsRjEgDjwAAAABJRU5ErkJggg==);
        }

        .duckling.left .head,
        .duckling.right .head {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAQCAYAAAAWGF8bAAAAAXNSR0IArs4c6QAAAH9JREFUOE9jZKAyYKSyeQw4Dfz/wfc/PssYBTZj1YshSMggdEvQDUYxkFTDYIYjGwo3kFzD0A0l2sAsl1NgvdP2mGENWpgrh5CBf05EYU0mzBqfiUqqKF7GZRjMJGIMhRtIyDBiDMVINoQMxedCnAmb1DAkOusRFQN4FFG9tAEAKQA+EfjQv5MAAAAASUVORK5CYII=);
        }

        .duckling .body {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAOCAYAAAAvxDzwAAAAAXNSR0IArs4c6QAAAFRJREFUOE9jZMAC/n/w/Y9NHF2MUWAzI4YYsgCxBuEzGG4DuYbBDIe5FmwgpYYhG0p9A6nlOrgrR6CBgz+WYbFDaeSgJGxKDUXO0xiZm5QwxVY4AADr4DT71oa+KgAAAABJRU5ErkJggg==);
        }

        .duckling .tail {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAAHCAYAAAArkDztAAAAAXNSR0IArs4c6QAAAC1JREFUGFdjZICC/x98/4OYjAKbGcE0iIAJwhSBJHFLoKuG68IpgdcOZEmYqwCKgxp+Dp/FvAAAAABJRU5ErkJggg==);
        }

        .duckling.waddle .leg {
            animation: waddle 0.2s infinite;
        }

        .duckling .leg:after {
            height: 3px;
            width: 2px;
            left: 0;
            bottom: 0px;
        }

        .duckling.hit .waddle {
            animation: waddle 0.1s infinite;
        }

        button.create-duckling {
            position: fixed;
            bottom: 45px;
            right: 30px;
            --size: 60px;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAYAAAA6/NlyAAAAAXNSR0IArs4c6QAAAbpJREFUaEPtmMGNwjAQRYmgAMqgASQK4LoVbAdbEB1QAVcKQNpmVnteiVWQgqLgeP54bGdkPteMx//Nn4xjutWb/bo3410RuHXH6TAdbqwCbOnGDH3BocN0uLEKsKUbM5RDiy2NtvT95+Mei+22F5fFVIuSQKdF8AauAtbCDvCeoGHgVFhv0NmAv47fD7bTdR98tb24TOC5ySu1dC2HBx2pHQM7/Hf7DB5D690vdJKlCpwmrwI8BzuIQaDHwBbRlrW9XtFhCRaBDsGmTu/iwL0wCRpx+FHd7aWbzgJtq1cBjkGjsLk+Q6sBzw0PaGIJQRqXFwGWjihNEUKw1vyxAopDKyTeKkgaWNb8WYGtYqy3qeotTWDNCxuI1QysfjkdVhbc5dCKMVR3eNxWyuK+hGvbeZGWHlRbh1cK7KLAFqdTYa0dBd2WkE1Qt5cEfX7sIEBSTH+b2hzO0QGIxEj75HieNKWnGyMwSEwOICkHgaUKjZ+P/xiYa2kkRrOnNdbkMAKDxFghNOtNwJqNvMQS2IsTpXTQ4VKV9ZKXDntxopQOOlyqsl7y0mEvTpTSQYdLVdZLXjrsxYlSOv4BWdLiPeCnzDQAAAAASUVORK5CYII=);
            width: var(--size);
            height: var(--size);
            border-width: 0;
            background-color: rgb(2, 117, 115);
            background-size: var(--size) !important;
            background-repeat: no-repeat !important;
            border-radius: 50%;
            image-rendering: pixelated;
            cursor: pointer;
            z-index: 100;
        }

        button.create-duckling:hover {
            border: 2px solid white;
            width: calc(var(--size) + 2px);
            height: calc(var(--size) + 2px);
        }


        /* other */

        .sign {
            position: absolute;
            color: #fff945;
            bottom: 10px;
            right: 10px;
            font-size: 10px;
        }

        .bebek a {
            color: #fff945;
            text-decoration: none;
        }

        .bebek a:hover {
            text-decoration: underline;
        }

        .indicator {
            position: fixed;
            top: 10px;
            left: 10px;
            color: #fff945;
            display: none;
        }

        .indicator {
            position: fixed;
            top: 10px;
            right: 10px;
        }

        .marker {
            position: absolute;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-top: -5px;
            margin-left: -5px;
            transition: 0.1s;
            z-index: 100;
            display: none;
        }

        .red {
            background-color: rgb(223, 74, 41);
        }

        .blue {
            background-color: rgb(140, 238, 250);
        }

        .yellow {
            background-color: yellow;
        }

        .pink {
            background-color: hotpink;
        }

        .green {
            background-color: rgb(88, 236, 127);
        }

        .purple {
            background-color: purple;
        }

        /* HADIAN */
        .gift {
            position: absolute;
            bottom: 0px;
            width: 150px;
            left: 172px;
            z-index: 12;
            height: 180px;
        }

        .wrap {
            height: 300px;
            width: 800px;
            margin: 0px auto;
            position: relative;
        }

        .ribbon_right {
            width: 45px;
            height: 45px;
            border-radius: 100% 100% 100% 0px;
            box-shadow: 0px 0px 0px 10px #1495f1 inset;
            position: absolute;
            right: 30px;
        }

        .ribbon_left {
            width: 45px;
            height: 45px;
            border-radius: 100% 100% 0px 100%;
            box-shadow: 0px 0px 0px 10px #1aa8fc inset;
            position: absolute;
            left: 30px;
        }

        .gift_box_top {
            height: 28px;
            top: 45px;
            position: absolute;
            width: 150px;
            background: #ff7d6d;
            box-shadow: -75px 0px 0px #ff6259 inset;
        }

        .gift_ribbon_center {
            width: 2px;
            bottom: 0px;
            position: absolute;
            right: 0;
            left: 0;
            margin: 0px auto;
            background: #1cadfe;
            height: 140px;
            border-right: 6px solid #28C9FF;
            border-left: 6px solid #28C9FF;
            z-index: 10;
        }

        .gift_box_bottom {
            background: #ff8168;
            bottom: 0px;
            height: 102px;
            overflow: hidden;
            right: 7px;
            position: absolute;
            width: 136px;
            box-shadow: -70px 0px 0px #fe6d68 inset;
        }

        .gift_box_bottom_top {
            height: 5px;
            width: 136px;
            right: 7px;
            position: absolute;
            bottom: 102px;
            background: #dd4b4c;
        }

        .gift_ribbon_left {
            height: 55px;
            width: 15px;
            left: 15px;
            position: absolute;
            background: #28c9ff;
            top: 40px;
            z-index: 11;
        }

        .gift_ribbon_left:after {
            border-width: 9px;
            border-style: solid;
            border-color: transparent;
            border-bottom-color: #ff8168;
            z-index: 12;
            position: absolute;
            content: "";
            bottom: 0px;
        }

        .gift_box_bottom_ribbon {
            position: absolute;
            right: -25px;
            height: 12px;
            width: 110px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            background: #ff4149;
        }

        #ribbon1 {
            top: -15px;
        }

        #ribbon2 {
            top: 20px;
        }

        #ribbon3 {
            top: 55px;
        }

        #ribbon4 {
            top: 90px;
        }

        .line {
            height: 25px;
            width: 100%;
            background: #fff;
            bottom: -25px;
            position: absolute;
        }

        .cake {
            position: absolute;
            bottom: 0px;
            width: 330px;
            right: 172px;
            height: 240px;
        }

        .cake_bottom {
            position: absolute;
            width: 330px;
            height: 5px;
            bottom: 0px;
            background: #9dc5c4;
            border-top: 2px solid #e6e7e9;
        }

        .cake_bottom2 {
            position: absolute;
            width: 320px;
            bottom: 7px;
            background: #cd7a1c;
            height: 22px;
            right: 5px;
            border-radius: 3px 3px 0px 0px;
            left: 5px;
            box-shadow: -160px 0px 0px #ad631c inset;
        }

        .cake_bottom3 {
            box-shadow: 0px -3px 0px #fddbea, -155px 0px 0px #5a4027 inset;
            height: 52px;
            border-top: 5px solid #ff7ebe;
            background: #744c28;
            position: absolute;
            width: 310px;
            bottom: 29px;
            right: 10px;
            border-radius: 5px 5px 0px 0px;
            left: 10px;
        }

        .cake_top1 {
            box-shadow: -115px 0px 0px #ff9201 inset;
            height: 46px;
            background: #ffb009;
            position: absolute;
            width: 230px;
            bottom: 89px;
            right: 50px;
            border-radius: 5px 5px 0px 0px;
            left: 50px;
            border-bottom: 3px solid #c14500;
        }

        .cake_top2 {
            box-shadow: -70px 0px 0px #5b3f29 inset;
            height: 52px;
            background: #744c28;
            position: absolute;
            width: 140px;
            bottom: 138px;
            border-radius: 5px 5px 0px 0px;
            left: 0px;
            right: 0px;
            margin: 0px auto;
        }

        .cake_line {
            bottom: 0px;
            height: 30px;
            width: 5px;
            position: absolute;
        }

        #cake_line1 {
            left: 2px;
            background: #ff9101;
        }

        #cake_line2 {
            left: 12px;
            background: #ff9101;
        }

        #cake_line3 {
            left: 22px;
            background: #ff9101;
        }

        #cake_line4 {
            left: 32px;
            background: #ff9101;
        }

        #cake_line5 {
            left: 42px;
            background: #ff9101;
        }

        #cake_line6 {
            left: 52px;
            background: #ff9101;
        }

        #cake_line7 {
            left: 62px;
            background: #ff9101;
        }

        #cake_line8 {
            left: 72px;
            background: #ff9101;
        }

        #cake_line9 {
            left: 82px;
            background: #ff9101;
        }

        #cake_line10 {
            left: 92px;
            background: #ff9101;
        }

        #cake_line11 {
            left: 102px;
            background: #ff9101;
        }

        #cake_line12 {
            left: 112px;
            background: #ff9101;
        }

        #cake_line13 {
            right: 3px;
            background: #ff7000;
        }

        #cake_line14 {
            right: 13px;
            background: #ff7000;
        }

        #cake_line15 {
            right: 23px;
            background: #ff7000;
        }

        #cake_line16 {
            right: 33px;
            background: #ff7000;
        }

        #cake_line17 {
            right: 43px;
            background: #ff7000;
        }

        #cake_line18 {
            right: 53px;
            background: #ff7000;
        }

        #cake_line19 {
            right: 63px;
            background: #ff7000;
        }

        #cake_line20 {
            right: 73px;
            background: #ff7000;
        }

        #cake_line21 {
            right: 83px;
            background: #ff7000;
        }

        #cake_line22 {
            right: 93px;
            background: #ff7000;
        }

        #cake_line23 {
            right: 103px;
            background: #ff7000;
        }

        #cake_line24 {
            right: 113px;
            background: #ff7000;
        }

        .cherry {
            width: 15px;
            top: -15px;
            height: 15px;
            border-radius: 100%;
            background: #fff;
            position: absolute;
            box-shadow: -2px -1px 0px 6px #ff4d59 inset;
        }

        #cherry1 {
            left: 20px;
        }

        #cherry2 {
            left: 64px;
        }

        #cherry3 {
            left: 108px;
        }

        #cherry4 {
            right: 64px;
        }

        #cherry5 {
            right: 20px;
        }

        .cake_circle {
            height: 56px;
            width: 56px;
            border-radius: 100%;
            box-shadow: 0px 0px 0px 12px #ffebc8 inset;
            top: -30px;
            z-index: 100;
            position: absolute;
        }

        .circles {
            position: absolute;
            height: 30px;
            width: 100%;
            overflow: hidden;
            top: 0px;
        }

        #circle1 {
            left: -1px;
        }

        #circle2 {
            left: 43px;
        }

        #circle3 {
            left: 87px;
        }

        #circle4 {
            right: 43px;
        }

        #circle5 {
            right: -1px;
        }

        .cake_top1_creams {
            height: 18px;
            border-radius: 5px;
            background: #f24282;
            position: absolute;
            top: 0px;
            width: 100%;
        }

        .cake_top1_cream1 {
            position: absolute;
            left: -3px;
            height: 25px;
            width: 15px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_top1_cream2 {
            position: absolute;
            left: 12px;
            height: 25px;
            width: 10px;
            border-radius: 9px;
            background: #744c28;
            top: 10px;
        }

        .cake_top1_cream3 {
            position: absolute;
            left: 22px;
            height: 23px;
            width: 10px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_top1_cream4 {
            position: absolute;
            left: 32px;
            height: 25px;
            width: 12px;
            border-radius: 9px;
            background: #744c28;
            top: 13px;
        }

        .cake_top1_cream5 {
            position: absolute;
            left: 44px;
            height: 30px;
            width: 13px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_top1_cream6 {
            position: absolute;
            left: 57px;
            height: 25px;
            width: 13px;
            border-radius: 9px;
            background: #744c28;
            top: 9px;
        }

        .cake_top1_cream7 {
            position: absolute;
            right: -3px;
            height: 22px;
            width: 8px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_top1_cream8 {
            position: absolute;
            right: 5px;
            height: 25px;
            width: 10px;
            border-radius: 9px;
            background: #5b3f29;
            top: 8px;
        }

        .cake_top1_cream9 {
            position: absolute;
            right: 15px;
            height: 31px;
            width: 10px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_top1_cream10 {
            position: absolute;
            right: 25px;
            height: 15px;
            width: 10px;
            border-radius: 9px;
            background: #5b3f29;
            top: 13px;
        }

        .cake_top1_cream11 {
            position: absolute;
            right: 35px;
            height: 24px;
            width: 13px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_top1_cream12 {
            position: absolute;
            right: 48px;
            height: 15px;
            width: 12px;
            border-radius: 9px;
            background: #5b3f29;
            top: 10px;
        }

        .cake_top1_cream13 {
            position: absolute;
            right: 60px;
            height: 26px;
            width: 10px;
            border-radius: 9px;
            background: #f14380;
        }

        .cake_bottom3_creams {
            height: 22px;
            border-radius: 5px;
            background: #ff7fbf;
            position: absolute;
            top: -5px;
            width: 100%;
        }

        .cake_bottom3_cream1 {
            position: absolute;
            left: -3px;
            height: 35px;
            width: 18px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream2 {
            position: absolute;
            left: 15px;
            height: 24px;
            width: 15px;
            border-radius: 9px;
            top: 12px;
            background: #744c28;
        }

        .cake_bottom3_cream3 {
            position: absolute;
            left: 30px;
            height: 38px;
            width: 10px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream4 {
            position: absolute;
            left: 40px;
            height: 24px;
            width: 15px;
            border-radius: 9px;
            top: 15px;
            background: #744c28;
        }

        .cake_bottom3_cream5 {
            position: absolute;
            left: 55px;
            height: 30px;
            width: 15px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream6 {
            position: absolute;
            left: 70px;
            height: 20px;
            width: 12px;
            border-radius: 100px;
            top: 17px;
            background: #744c28;
        }

        .cake_bottom3_cream7 {
            position: absolute;
            left: 82px;
            height: 40px;
            width: 18px;
            border-radius: 100px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream8 {
            position: absolute;
            left: 100px;
            height: 20px;
            width: 22px;
            border-radius: 100px;
            top: 10px;
            background: #744c28;
        }

        .cake_bottom3_cream9 {
            position: absolute;
            left: 122px;
            height: 67px;
            width: 24px;
            border-radius: 100px;
            background: #ff7fbf;
            z-index: 3;
        }

        .cake_bottom3_cream10 {
            position: absolute;
            left: 146px;
            height: 20px;
            width: 9px;
            border-radius: 100px;
            top: 16px;
            background: #744c28;
        }

        .cake_bottom3_cream11 {
            position: absolute;
            right: 140px;
            height: 37px;
            width: 15px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream12 {
            position: absolute;
            right: 128px;
            height: 23px;
            width: 12px;
            border-radius: 100px;
            top: 13px;
            background: #5b3f27;
        }

        .cake_bottom3_cream13 {
            position: absolute;
            left: 116px;
            height: 59px;
            width: 36px;
            border-radius: 100px;
            background: #744c28;
            z-index: 2;
            top: 15px;
        }

        .cake_bottom3_cream14 {
            position: absolute;
            right: 108px;
            height: 64px;
            width: 20px;
            border-radius: 9px;
            background: #ff7fbf;
            z-index: 3;
        }

        .cake_bottom3_cream15 {
            position: absolute;
            right: 102px;
            height: 55px;
            width: 31px;
            border-radius: 100px;
            background: #5a4027;
            z-index: 2;
            top: 15px;
        }

        .cake_bottom3_cream16 {
            position: absolute;
            right: 93px;
            height: 23px;
            width: 15px;
            border-radius: 100px;
            top: 8px;
            background: #5b3f27;
        }

        .cake_bottom3_cream17 {
            position: absolute;
            right: 78px;
            height: 47px;
            width: 15px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream18 {
            position: absolute;
            right: 70px;
            height: 23px;
            width: 8px;
            border-radius: 100px;
            top: 16px;
            background: #5b3f27;
        }

        .cake_bottom3_cream19 {
            position: absolute;
            right: 58px;
            height: 30px;
            width: 12px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream20 {
            position: absolute;
            right: 43px;
            height: 23px;
            width: 15px;
            border-radius: 100px;
            top: 8px;
            background: #5b3f27;
        }

        .cake_bottom3_cream21 {
            position: absolute;
            right: 28px;
            height: 38px;
            width: 15px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom3_cream22 {
            position: absolute;
            right: 10px;
            height: 23px;
            width: 18px;
            border-radius: 100px;
            top: 14px;
            background: #5b3f27;
        }

        .cake_bottom3_cream23 {
            position: absolute;
            right: -3px;
            height: 30px;
            width: 13px;
            border-radius: 9px;
            background: #ff7fbf;
        }

        .cake_bottom1_creams {
            height: 10px;
            position: absolute;
            bottom: 0px;
            width: 100%;
        }

        .cake_bottom1_cream1 {
            position: absolute;
            left: 56px;
            height: 6px;
            width: 14px;
            border-radius: 20px 20px 0px 0px;
            background: #5a4027;
            bottom: 0px;
        }

        .cake_bottom1_cream2 {
            position: absolute;
            left: 115px;
            height: 5px;
            width: 10px;
            border-radius: 20px 20px 0px 0px;
            background: #5a4027;
            bottom: 0px;
        }

        .cake_bottom1_cream3 {
            position: absolute;
            right: 33px;
            height: 8px;
            width: 14px;
            border-radius: 20px 20px 0px 0px;
            background: #744c29;
            bottom: 0px;
        }

        .cake_bottom1_cream4 {
            position: absolute;
            right: 58px;
            height: 5px;
            width: 11px;
            border-radius: 20px 20px 0px 0px;
            background: #744c29;
            bottom: 0px;
        }

        .gift_top {
            -webkit-transition: all 0.6s ease-in-out;
            transition: all 0.6s ease-in-out;
            o-transition: all 0.6s ease-in-out;
            width: 100%;
            position: absolute;
            top: 0px;
            -webkit-transition-delay: 0.6s;
            transition-delay: 0.6s;
        }

        .gift:hover .gift_top {
            top: -100px;
            -webkit-transition-delay: 0.3s;
            transition-delay: 0.3s;
        }

        .gift_ribbon_left {
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            o-transition: all 0.3s ease-in-out;
            -webkit-transition-delay: 1s;
            transition-delay: 1s;
        }

        .gift_ribbon_center {
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            o-transition: all 0.3s ease-in-out;
            -webkit-transition-delay: 1s;
            transition-delay: 1s;
        }

        .gift:hover .gift_ribbon_left {
            height: 32px;
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
        }

        .gift:hover .gift_ribbon_center {
            -webkit-transition-delay: 0s;
            transition-delay: 0s;
            height: 102px;
        }

        .gift_box_bottom_top {
            -webkit-transition-delay: 1.1s;
            transition-delay: 1.1s;
        }

        .gift:hover .gift_box_bottom_top {
            height: 0px;
            opacity: 0;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            -webkit-transition-delay: 0.4s;
            transition-delay: 0.4s;
            o-transition: all 0.3s ease-in-out;
        }

        .giftcard {
            border-radius: 5px;
            background: #fff;
            box-shadow: 0px 1px 0px 1px #fee4c0;
            padding: 10px;
            width: 100px;
            font-size: 15px;
            font-family: 'Source Sans Pro', sans-serif;
            color: #020202;
            left: 0px;
            top: 100px;
            right: 0px;
            margin: 0px auto;
            position: absolute;
            line-height: 26px;
            z-index: -1;
            text-align: center;
            -webkit-transition: all 0.6s ease-in-out;
            transition: all 0.6s ease-in-out;
            -webkit-transition-delay: 0.5s;
            transition-delay: 0.5s;
            o-transition: all 0.6s ease-in-out;
        }

        .giftcard a {
            text-decoration: none;
            color: #020202;
        }

        .gift:hover .giftcard {
            top: -10px;
        }

        .one_number {
            position: absolute;
            left: 145px;
            top: 25px;
            width: 9px;
        }

        .one_number:after {
            height: 5px;
            width: 5px;
            position: absolute;
            background: #c6c6c6;
            top: 0px;
            left: 0px;
        }

        .one_number:before {
            content: "";
            height: 25px;
            width: 5px;
            position: absolute;
            background: #c6c6c6;
            top: 0px;
            right: 0px;
        }

        .seven_number {
            position: absolute;
            right: 147px;
            top: 25px;
            width: 14px;
        }

        .seven_number:after {
            height: 5px;
            width: 5px;
            position: absolute;
            background: #c6c6c6;
            top: 0px;
            left: 0px;
        }

        .seven_number:before {
            content: "";
            height: 25px;
            width: 5px;
            position: absolute;
            background: #c6c6c6;
            top: 0px;
            right: 0px;
        }

        .seven_flame {
            height: 12px;
            width: 6px;
            border-radius: 100%;
            background: #ffd215;
            position: absolute;
            right: -0.6px;
            -webkit-animation: flame 0.5s infinite linear;
            animation: flame 0.5s infinite linear;
            -moz-animation: flame 0.5s infinite linear;
            bottom: 2px;
        }

        .one_flame {
            height: 12px;
            width: 6px;
            border-radius: 100%;
            background: #ffd215;
            position: absolute;
            right: 0px;
            bottom: 2px;
            -webkit-animation: flame 0.5s infinite linear;
            animation: flame 0.5s infinite linear;
            -moz-animation: flame 0.5s infinite linear;
        }

        @-webkit-keyframes flame {
            0% {
                height: 12px;
                background: #fdd214;
            }

            50% {
                height: 14px;
                background: #ffc617;
            }

            100% {
                height: 12px;
                background: #fdd214;
            }
        }

        @keyframes flame {
            0% {
                height: 12px;
                background: #fdd214;
            }

            50% {
                height: 14px;
                background: #ffc617;
            }

            100% {
                height: 12px;
                background: #fdd214;
            }
        }

        @-moz-keyframes flame {
            0% {
                height: 12px;
                background: #fdd214;
            }

            50% {
                height: 14px;
                background: #ffc617;
            }

            100% {
                height: 12px;
                background: #fdd214;
            }
        }

        /* GALERI */
        * {
            margin: 0;
            padding: 0;
        }

        .galeri html,
        .galeri body {
            height: 100%;
            touch-action: none;
        }

        .galeri {
            margin-top: 10%;
            overflow: hidden;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            height: 800px;
            -webkit-perspective: 1000px;
            perspective: 1000px;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }

        #drag-container,
        #spin-container {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin: auto;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transform: rotateX(-10deg);
            transform: rotateX(-10deg);
        }

        #drag-container img,
        #drag-container video {
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            line-height: 200px;
            font-size: 50px;
            text-align: center;
            -webkit-box-shadow: 0 0 8px #fff;
            box-shadow: 0 0 8px #fff;
            -webkit-box-reflect: below 10px linear-gradient(transparent, transparent, #0005);
        }

        #drag-container img:hover,
        #drag-container video:hover {
            -webkit-box-shadow: 0 0 15px #fffd;
            box-shadow: 0 0 15px #fffd;
            -webkit-box-reflect: below 10px linear-gradient(transparent, transparent, #0007);
        }

        #drag-container p {
            font-family: Serif;
            position: absolute;
            top: 100%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%) rotateX(90deg);
            transform: translate(-50%, -50%) rotateX(90deg);
            color: #fff;
        }

        #ground {
            width: 900px;
            height: 900px;
            position: absolute;
            top: 100%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%) rotateX(90deg);
            transform: translate(-50%, -50%) rotateX(90deg);
            background: -webkit-radial-gradient(center center, farthest-side, #9993, transparent);
        }

        #music-container {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotateY(0deg);
                transform: rotateY(0deg);
            }

            to {
                -webkit-transform: rotateY(360deg);
                transform: rotateY(360deg);
            }
        }

        @keyframes spin {
            from {
                -webkit-transform: rotateY(0deg);
                transform: rotateY(0deg);
            }

            to {
                -webkit-transform: rotateY(360deg);
                transform: rotateY(360deg);
            }
        }

        @-webkit-keyframes spinRevert {
            from {
                -webkit-transform: rotateY(360deg);
                transform: rotateY(360deg);
            }

            to {
                -webkit-transform: rotateY(0deg);
                transform: rotateY(0deg);
            }
        }

        @keyframes spinRevert {
            from {
                -webkit-transform: rotateY(360deg);
                transform: rotateY(360deg);
            }

            to {
                -webkit-transform: rotateY(0deg);
                transform: rotateY(0deg);
            }
        }
    </style>
</head>

<body>
    <div class="petasan">
        <h1>Happy Birthday</h1>
        <div class="ucapan">
            <div class="card">
                <div class="imgBox">
                    <div class="bark"></div>
                    <img src="https://image.ibb.co/fYzTrb/lastofus.jpg">
                </div>
                <div class="details">
                    <h4 class="color1" style="font-size: 20px;">You're not a Fossil! (YET)</h4>
                    <h4 class="color2" style="padding-top: 25px;">(HAPPY BIRTHDAY)</h4>
                    <p style="padding-top: 25px;">Dear Dad,</p>
                    <p>Let's see.. .</p>
                    <p>You're never around, you</p>
                    <p>hate the music I'm into, you</p>
                    <p>practically despise the movies I</p>
                    <p>like, and yet somehow you still</p>
                    <p>manage to be the best dad every year.</p>
                    <p>How do you do that? :)</p>
                    <p class="text-right">Happy Birthday, papa!</p>
                    <p class="text-right">♥Sarah</p>
                </div>
            </div>
        </div>
        <canvas id="birthday"></canvas>
    </div>

    <div class="bebek">
        <div class="wrapper d-flex w-100">
            <div class="marker red"></div>
            <div class="marker blue"></div>
            <div class="marker yellow"></div>
            <div class="marker pink"></div>
            <div class="marker green"></div>
            <div class="marker purple"></div>

            <div class="duck down">
                <div class="neck-base">
                    <div class="neck">
                        <div class="head"></div>
                    </div>
                </div>
                <div class="tail"></div>
                <div class="body"></div>
                <div class="legs">
                    <div class="leg"></div>
                    <div class="leg"></div>
                </div>
            </div>
        </div>
        <button class="create-duckling"></button>
        <div class="indicator"></div>
    </div>

    <div class="hadiah">
        <section class="wrap">
            <section class="gift">
                <a href="{{ route('black') }}">
                    <div class="giftcard">Click
                        <br />Gift Card
                    </div>
                </a>
                <section class="gift_top">
                    <div class="ribbon_right"></div>
                    <div class="ribbon_left"></div>
                    <div class="gift_box_top"></div>
                    <div class="gift_ribbon_left"></div>
                </section>
                <div class="gift_ribbon_center"></div>
                <div class="gift_box_bottom_top"></div>
                <div class="gift_box_bottom">
                    <div class="gift_box_bottom_ribbon" id="ribbon1"></div>
                    <div class="gift_box_bottom_ribbon" id="ribbon2"></div>
                    <div class="gift_box_bottom_ribbon" id="ribbon3"></div>
                    <div class="gift_box_bottom_ribbon" id="ribbon4"></div>
                </div>
            </section>
            <section class="cake">
                <div class="one_number">
                    <div class="one_flame"></div>
                </div>
                <div class="seven_number">
                    <div class="seven_flame"></div>
                </div>
                <section class="cake_top2">
                    <section class="cake_top1_creams">
                        <div class="cake_top1_cream1"></div>
                        <div class="cake_top1_cream2"></div>
                        <div class="cake_top1_cream3"></div>
                        <div class="cake_top1_cream4"></div>
                        <div class="cake_top1_cream5"></div>
                        <div class="cake_top1_cream6"></div>
                        <div class="cake_top1_cream7"></div>
                        <div class="cake_top1_cream8"></div>
                        <div class="cake_top1_cream9"></div>
                        <div class="cake_top1_cream10"></div>
                        <div class="cake_top1_cream11"></div>
                        <div class="cake_top1_cream12"></div>
                        <div class="cake_top1_cream13"></div>
                    </section>
                </section>
                <section class="cake_top1">
                    <div class="cherry" id="cherry1"></div>
                    <div class="cherry" id="cherry2"></div>
                    <div class="cherry" id="cherry3"></div>
                    <div class="cherry" id="cherry4"></div>
                    <div class="cherry" id="cherry5"></div>
                    <section class="circles">
                        <div class="cake_circle" id="circle1"></div>
                        <div class="cake_circle" id="circle2"></div>
                        <div class="cake_circle" id="circle3"></div>
                        <div class="cake_circle" id="circle4"></div>
                        <div class="cake_circle" id="circle5"></div>
                    </section>
                    <div class="cake_line" id="cake_line1"></div>
                    <div class="cake_line" id="cake_line2"></div>
                    <div class="cake_line" id="cake_line3"></div>
                    <div class="cake_line" id="cake_line4"></div>
                    <div class="cake_line" id="cake_line5"></div>
                    <div class="cake_line" id="cake_line6"></div>
                    <div class="cake_line" id="cake_line7"></div>
                    <div class="cake_line" id="cake_line8"></div>
                    <div class="cake_line" id="cake_line9"></div>
                    <div class="cake_line" id="cake_line10"></div>
                    <div class="cake_line" id="cake_line11"></div>
                    <div class="cake_line" id="cake_line12"></div>
                    <div class="cake_line" id="cake_line13"></div>
                    <div class="cake_line" id="cake_line14"></div>
                    <div class="cake_line" id="cake_line15"></div>
                    <div class="cake_line" id="cake_line16"></div>
                    <div class="cake_line" id="cake_line17"></div>
                    <div class="cake_line" id="cake_line18"></div>
                    <div class="cake_line" id="cake_line19"></div>
                    <div class="cake_line" id="cake_line20"></div>
                    <div class="cake_line" id="cake_line21"></div>
                    <div class="cake_line" id="cake_line22"></div>
                    <div class="cake_line" id="cake_line23"></div>
                    <div class="cake_line" id="cake_line24"></div>
                </section>
                <section class="cake_bottom3">
                    <section class="cake_bottom3_creams">
                        <div class="cake_bottom3_cream1"></div>
                        <div class="cake_bottom3_cream2"></div>
                        <div class="cake_bottom3_cream3"></div>
                        <div class="cake_bottom3_cream4"></div>
                        <div class="cake_bottom3_cream5"></div>
                        <div class="cake_bottom3_cream6"></div>
                        <div class="cake_bottom3_cream7"></div>
                        <div class="cake_bottom3_cream8"></div>
                        <div class="cake_bottom3_cream9"></div>
                        <div class="cake_bottom3_cream10"></div>
                        <div class="cake_bottom3_cream11"></div>
                        <div class="cake_bottom3_cream12"></div>
                        <div class="cake_bottom3_cream13"></div>
                        <div class="cake_bottom3_cream14"></div>
                        <div class="cake_bottom3_cream15"></div>
                        <div class="cake_bottom3_cream16"></div>
                        <div class="cake_bottom3_cream17"></div>
                        <div class="cake_bottom3_cream18"></div>
                        <div class="cake_bottom3_cream19"></div>
                        <div class="cake_bottom3_cream20"></div>
                        <div class="cake_bottom3_cream21"></div>
                        <div class="cake_bottom3_cream22"></div>
                        <div class="cake_bottom3_cream23"></div>
                    </section>
                </section>
                <section class="cake_bottom2">
                    <section class="cake_bottom1_creams">
                        <div class="cake_bottom1_cream1"></div>
                        <div class="cake_bottom1_cream2"></div>
                        <div class="cake_bottom1_cream3"></div>
                        <div class="cake_bottom1_cream4"></div>
                    </section>
                </section>
                <div class="cake_bottom">
                </div>
            </section>
            <div class="line"></div>
        </section>
    </div>

    <div class="galeri">
        <div id="drag-container">
            <div id="spin-container">
                <img src="https://images.pexels.com/photos/206395/pexels-photo-206395.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    alt="">
                <img src="https://images.pexels.com/photos/1391498/pexels-photo-1391498.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    alt="">
                <img src="https://images.pexels.com/photos/1382731/pexels-photo-1382731.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    alt="">
                <img src="https://images.pexels.com/photos/1758144/pexels-photo-1758144.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    alt="">
                <img src="https://images.pexels.com/photos/1382734/pexels-photo-1382734.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    alt="">
                <img src="https://images.pexels.com/photos/1462636/pexels-photo-1462636.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                    alt="">
                <p>3D Tiktok Carousel</p>
            </div>
            <div id="ground"></div>
        </div>
        <div id="music-container"></div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
    <script>
        var radius = 500;
        var autoRotate = true;
        var rotateSpeed = -60;
        var imgWidth = 120;
        var imgHeight = 170;
        var bgMusicURL = 'null';
        var bgMusicControls = true;

        setTimeout(init, 1000);

        var odrag = document.getElementById('drag-container');
        var ospin = document.getElementById('spin-container');
        var aImg = ospin.getElementsByTagName('img');
        var aVid = ospin.getElementsByTagName('video');
        var aEle = [...aImg, ...aVid]; // combine 2 arrays

        // Size of images
        ospin.style.width = imgWidth + "px";
        ospin.style.height = imgHeight + "px";

        // Size of ground - depend on radius
        var ground = document.getElementById('ground');
        ground.style.width = radius * 3 + "px";
        ground.style.height = radius * 3 + "px";

        function init(delayTime) {
            for (var i = 0; i < aEle.length; i++) {
                aEle[i].style.transform = "rotateY(" + (i * (360 / aEle.length)) + "deg) translateZ(" + radius + "px)";
                aEle[i].style.transition = "transform 1s";
                aEle[i].style.transitionDelay = delayTime || (aEle.length - i) / 4 + "s";
            }
        }

        function applyTranform(obj) {
            if (tY > 180) tY = 180;
            if (tY < 0) tY = 0;
            obj.style.transform = "rotateX(" + (-tY) + "deg) rotateY(" + (tX) + "deg)";
        }

        function playSpin(yes) {
            ospin.style.animationPlayState = (yes ? 'running' : 'paused');
        }

        var sX, sY, nX, nY, desX = 0,
            desY = 0,
            tX = 0,
            tY = 10;

        if (autoRotate) {
            var animationName = (rotateSpeed > 0 ? 'spin' : 'spinRevert');
            ospin.style.animation = `${animationName} ${Math.abs(rotateSpeed)}s infinite linear`;
        }

        document.onpointerdown = function (e) {
            clearInterval(odrag.timer);
            e = e || window.event;
            var sX = e.clientX,
                sY = e.clientY;

            this.onpointermove = function (e) {
                e = e || window.event;
                var nX = e.clientX,
                    nY = e.clientY;
                desX = nX - sX;
                desY = nY - sY;
                tX += desX * 0.1;
                tY += desY * 0.1;
                applyTranform(odrag);
                sX = nX;
                sY = nY;
            };

            this.onpointerup = function (e) {
                odrag.timer = setInterval(function () {
                    desX *= 0.95;
                    desY *= 0.95;
                    tX += desX * 0.1;
                    tY += desY * 0.1;
                    applyTranform(odrag);
                    playSpin(false);
                    if (Math.abs(desX) < 0.5 && Math.abs(desY) < 0.5) {
                        clearInterval(odrag.timer);
                        playSpin(true);
                    }
                }, 17);
                this.onpointermove = this.onpointerup = null;
            };

            return false;
        };

        document.onmousewheel = function (e) {
            e = e || window.event;
            var d = e.wheelDelta / 20 || -e.detail;
            radius += d;
            init(1);
        };

    </script>
    <script>
        const wrapper = document.querySelector('.wrapper')
        const marker = document.querySelectorAll('.marker')
        const indicator = document.querySelector('.indicator')
        const createDucklingBtn = document.querySelector('.create-duckling')

        const data = {
            interval: null,
            target: { x: 0, y: 0 },
            newTarget: { x: 0, y: 0 },
            cursor: { x: 0, y: 0 },
            duck: {
                x: 0,
                y: 0,
                angle: 0,
                direction: '',
                offset: { x: 20, y: 14 },
                el: document.querySelector('.duck'),
                direction: 'down',
            },
            ducklingTargets: [],
            ducklings: []
        }

        const directionConversions = {
            360: 'up', 45: 'up right', 90: 'right', 135: 'down right', 180: 'down', 225: 'down left', 270: 'left', 315: 'up left',
        }

        const px = num => `${num}px`
        const radToDeg = rad => Math.round(rad * (180 / Math.PI))
        const degToRad = deg => deg / (180 / Math.PI)
        const nearestN = (x, n) => x === 0 ? 0 : (x - 1) + Math.abs(((x - 1) % n) - n)
        const randomN = max => Math.ceil(Math.random() * max)
        const overlap = (a, b, buffer) => {
            const bufferToApply = buffer || 20
            return Math.abs(a - b) < bufferToApply
        }

        const positionMarker = (i, pos) => {
            marker[i].style.left = px(pos.x)
            marker[i].style.top = px(pos.y)
        }

        const offsetPosition = data => {
            return {
                x: data.x + data.offset.x,
                y: data.y + data.offset.y,
            }
        }

        const checkCollision = ({ a, b, buffer }) => {
            return overlap(a.x, b.x, buffer) && overlap(a.y, b.y, buffer)
        }

        const setStyles = ({ el, x, y }) => {
            el.style.transform = `translate(${x ? px(x) : 0}, ${y ? px(y) : 0})`
            el.style.zIndex = y
        }

        const updateData = (data, newData) => {
            Object.keys(newData).forEach(key => {
                data[key] = newData[key]
            })
        }

        const moveDucklingTargets = ({ x, y }) => {
            data.ducklingTargets.forEach((duckling, i) => {
                clearTimeout(duckling.timer)
                duckling.timer = setTimeout(() => {
                    moveDuck(duckling, getOffsetPos({
                        x, y,
                        angle: data.duck.angle + 180,
                        distance: 60 + (80 * i)
                    }))
                }, 150 + randomN(40))
            })
        }

        const moveDuck = (duck, { x, y }) => {
            updateData(duck, { x, y })
            setStyles(duck)
        }

        const moveMotherDuck = ({ x, y }) => {
            moveDuck(data.duck, { x, y })
            moveDucklingTargets({ x, y })
        }

        const elAngle = (el, pos) => {
            const { x, y } = pos
            const angle = radToDeg(Math.atan2(el.y - y, el.x - x)) - 90
            const adjustedAngle = angle < 0 ? angle + 360 : angle
            return nearestN(adjustedAngle, 1)
        }

        const rotateCoord = ({ deg, x, y, offset }) => {
            const rad = degToRad(deg)
            const nX = x - offset.x
            const nY = y - offset.y
            const nSin = Math.sin(rad)
            const nCos = Math.cos(rad)
            return {
                x: Math.round((nCos * nX - nSin * nY) + offset.x),
                y: Math.round((nSin * nX + nCos * nY) + offset.y)
            }
        }

        const distanceBetween = (a, b) => Math.round(Math.sqrt(Math.pow((a.x - b.x), 2) + Math.pow((a.y - b.y), 2)))

        const getOffsetPos = ({ x, y, distance, angle }) => {
            return {
                x: x + (distance * Math.cos(degToRad(angle - 90))),
                y: y + (distance * Math.sin(degToRad(angle - 90)))
            }
        }

        const getNewPosBasedOnTarget = ({ start, target, distance: d, fullDistance }) => {
            const { x: aX, y: aY } = start
            const { x: bX, y: bY } = target

            const remainingD = fullDistance - d
            return {
                x: Math.round(((remainingD * aX) + (d * bX)) / fullDistance),
                y: Math.round(((remainingD * aY) + (d * bY)) / fullDistance)
            }
        }

        const getDirection = ({ pos, facing, target }) => {
            const dx2 = facing.x - pos.x
            const dy1 = pos.y - target.y
            const dx1 = target.x - pos.x
            const dy2 = pos.y - facing.y

            return dx2 * dy1 > dx1 * dy2 ? 'anti-clockwise' : 'clockwise'
        }

        const updateCursorPos = e => {
            data.cursor.x = e.pageX
            data.cursor.y = e.pageY

            positionMarker(0, data.cursor)
        }

        const returnAngleDiff = ({ angleA, angleB }) => {
            const diff1 = Math.abs(angleA - angleB)
            const diff2 = 360 - diff1

            return diff1 > diff2 ? diff2 : diff1
        }

        const getDirectionClass = angle => {
            return directionConversions[nearestN(angle, 45)]
        }

        const setNewTargetAndDirection = fullDistance => {
            const distanceToMove = fullDistance > 80 ? 80 : fullDistance
            data.newTarget = getNewPosBasedOnTarget({
                distance: distanceToMove,
                fullDistance,
                start: offsetPosition(data.duck),
                target: data.cursor
            })
            data.duck.direction = getDirection({
                pos: offsetPosition(data.duck),
                facing: data.target,
                target: data.newTarget
            })

            positionMarker(3, offsetPosition(data.duck))
            positionMarker(2, data.target)
            positionMarker(1, data.newTarget)
        }

        const turnMotherDuckAndUpdateDirection = ({ diff, limit }) => {
            const angle = elAngle(offsetPosition(data.duck), rotateCoord({
                deg: {
                    'clockwise': diff > limit ? limit : diff,
                    'anti-clockwise': diff > limit ? -limit : -diff
                }[data.duck.direction],
                x: data.target.x,
                y: data.target.y,
                offset: offsetPosition(data.duck),
            }))

            // determine how much the duck waddles
            moveMotherDuck(getOffsetPos({
                x: data.duck.x,
                y: data.duck.y,
                distance: 50,
                angle
            }), data.duck)
            data.target = getOffsetPos({
                x: data.duck.x,
                y: data.duck.y,
                distance: 100,
                angle
            })

            // check how much the duck turned and round to nearest 45 degrees
            const newAngle = elAngle(offsetPosition(data.duck), data.target)
            updateData(data.duck, { angle: newAngle, direction: getDirectionClass(newAngle) })
            data.duck.el.className = `duck waddle ${data.duck.direction}`
            indicator.innerHTML = `duck waddle ${data.duck.direction}`
        }

        moveMotherDuckTowardsTarget = () => {
            const angle = elAngle(offsetPosition(data.duck), data.newTarget)
            const direction = getDirectionClass(angle)
            data.duck.el.className = `duck waddle ${direction}`
            indicator.innerHTML = `duck waddle ${direction}`

            moveMotherDuck(data.newTarget, data.duck)
            positionMarker(4, data.duck)

            data.target = getOffsetPos({
                x: data.duck.x,
                y: data.duck.y,
                distance: 50,
                angle
            })
            updateData(data.duck, { angle, direction })
            positionMarker(5, data.target)
        }

        const triggerDuckMovement = () => {
            data.interval = setInterval(() => {
                const fullDistance = distanceBetween(offsetPosition(data.duck), data.cursor)

                if (!fullDistance || fullDistance < 80) {
                    // stop waddling when close to target
                    data.duck.el.classList.remove('waddle')
                    return
                }
                setNewTargetAndDirection(fullDistance)

                const howMuchMotherDuckNeedsToTurn = returnAngleDiff({
                    angleA: elAngle(offsetPosition(data.duck), data.target),
                    angleB: elAngle(offsetPosition(data.duck), data.newTarget)
                })
                const maxAngleMotherDuckCanTurn = 60

                howMuchMotherDuckNeedsToTurn > maxAngleMotherDuckCanTurn
                    ? turnMotherDuckAndUpdateDirection({
                        diff: howMuchMotherDuckNeedsToTurn,
                        limit: maxAngleMotherDuckCanTurn
                    })
                    : moveMotherDuckTowardsTarget()

            }, 500)
        }

        const moveDucklings = () => {
            data.ducklings.forEach((duckling, i) => {
                if (duckling.hit) return
                const fullDistance = distanceBetween(duckling, data.ducklingTargets[i])

                if (!fullDistance || fullDistance < 40) {
                    duckling.el.classList.remove('waddle')
                    return
                }
                moveDuck(duckling, getNewPosBasedOnTarget({
                    distance: 30,
                    fullDistance,
                    start: duckling,
                    target: data.ducklingTargets[i]
                }))
                const angle = elAngle(offsetPosition(duckling), data.ducklingTargets[i])
                updateData(duckling, { direction: getDirectionClass(angle) })
                duckling.el.className = `duckling waddle ${duckling.direction}`
            })
        }

        const collisionCheckDucklings = () => {
            data.ducklings.forEach(duckling => {
                const { x, y } = duckling.el.getBoundingClientRect()
                if (checkCollision({
                    a: data.duck,
                    b: { x, y },
                    buffer: 40
                })) {
                    duckling.el.classList.add('hit')
                    duckling.hit = true

                    const { direction } = duckling
                    const x = direction.includes('right')
                        ? -20
                        : direction.includes('left')
                            ? 20
                            : 0

                    const y = direction.includes('up')
                        ? 20
                        : direction.includes('down')
                            ? -20
                            : 0

                    moveDuck(duckling, {
                        x: duckling.x + x,
                        y: duckling.y + y,
                    })
                    setTimeout(() => {
                        duckling.el.classList.remove('hit')
                        duckling.hit = false
                    }, 900)
                }
            })
        }

        const createDuckling = () => {
            const newDucklingTarget = document.createElement('div')
            newDucklingTarget.classList.add('duckling-target')
            const newDuckling = document.createElement('div')
            newDuckling.classList.add('duckling')
            newDuckling.innerHTML = `
      <div class="neck-base">
        <div class="neck">
          <div class="head"></div>
        </div>
      </div>
      <div class="tail"></div>
      <div class="body"></div>
      <div class="legs">
        <div class="leg"></div>
        <div class="leg"></div>
      </div>`
                ;[newDucklingTarget, newDuckling].forEach(ele => wrapper.appendChild(ele))

            data.ducklings.push({ el: newDuckling, x: 0, y: 0, direction: 'down', offset: { x: 10, y: 7 }, hit: false },)
            data.ducklingTargets.push({ el: newDucklingTarget, x: 0, y: 0, timer: null, offset: 6 })

            moveDuck(data.ducklings[data.ducklings.length - 1], { x: -50, y: -50, })
        }


            // set up
            ;['click', 'mousemove'].forEach(action => window.addEventListener(action, updateCursorPos))

        createDucklingBtn.addEventListener('click', () => {
            createDuckling()

            clearInterval(data.interval)
            triggerDuckMovement()
        })

        const { width, height } = wrapper.getBoundingClientRect()
        updateData(data.cursor, { x: width / 2, y: height / 2 })
        triggerDuckMovement()
        for (let n = 0; n < 3; n++) {
            createDuckling()
        }
        setInterval(moveDucklings, 300)
        setInterval(collisionCheckDucklings, 100)
    </script>
    <script>
        const PI2 = Math.PI * 2
        const random = (min, max) => Math.random() * (max - min + 1) + min | 0
        const timestamp = _ => new Date().getTime()
        class Birthday {
            constructor() {
                this.resize()
                this.fireworks = []
                this.counter = 0
            }

            resize() {
                this.width = canvas.width = window.innerWidth
                let center = this.width / 2 | 0
                this.spawnA = center - center / 4 | 0
                this.spawnB = center + center / 4 | 0
                this.height = canvas.height = window.innerHeight
                this.spawnC = this.height * .1
                this.spawnD = this.height * .5
            }

            onClick(evt) {
                let x = evt.clientX || evt.touches && evt.touches[0].pageX
                let y = evt.clientY || evt.touches && evt.touches[0].pageY
                let count = random(3, 5)
                for (let i = 0; i < count; i++) this.fireworks.push(new Firework(
                    random(this.spawnA, this.spawnB),
                    this.height,
                    x,
                    y,
                    random(0, 260),
                    random(30, 110)))
                this.counter = -1
            }

            update(delta) {
                ctx.globalCompositeOperation = 'hard-light'
                ctx.fillStyle = `rgba(20,20,20,${7 * delta})`
                ctx.fillRect(0, 0, this.width, this.height)
                ctx.globalCompositeOperation = 'lighter'
                for (let firework of this.fireworks) firework.update(delta)
                this.counter += delta * 3
                if (this.counter >= 1) {
                    this.fireworks.push(new Firework(
                        random(this.spawnA, this.spawnB),
                        this.height,
                        random(0, this.width),
                        random(this.spawnC, this.spawnD),
                        random(0, 360),
                        random(30, 110)))
                    this.counter = 0
                }
                if (this.fireworks.length > 1000) this.fireworks = this.fireworks.filter(firework => !firework.dead)
            }
        }

        class Firework {
            constructor(x, y, targetX, targetY, shade, offsprings) {
                this.dead = false
                this.offsprings = offsprings
                this.x = x
                this.y = y
                this.targetX = targetX
                this.targetY = targetY
                this.shade = shade
                this.history = []
            }
            update(delta) {
                if (this.dead) return
                let xDiff = this.targetX - this.x
                let yDiff = this.targetY - this.y
                if (Math.abs(xDiff) > 3 || Math.abs(yDiff) > 3) {
                    this.x += xDiff * 2 * delta
                    this.y += yDiff * 2 * delta
                    this.history.push({
                        x: this.x,
                        y: this.y
                    })
                    if (this.history.length > 20) this.history.shift()
                } else {
                    if (this.offsprings && !this.madeChilds) {
                        let babies = this.offsprings / 2
                        for (let i = 0; i < babies; i++) {
                            let targetX = this.x + this.offsprings * Math.cos(PI2 * i / babies) | 0
                            let targetY = this.y + this.offsprings * Math.sin(PI2 * i / babies) | 0
                            birthday.fireworks.push(new Firework(this.x, this.y, targetX, targetY, this.shade, 0))
                        }
                    }
                    this.madeChilds = true
                    this.history.shift()
                }

                if (this.history.length === 0) this.dead = true
                else if (this.offsprings) {
                    for (let i = 0; this.history.length > i; i++) {
                        let point = this.history[i]
                        ctx.beginPath()
                        ctx.fillStyle = 'hsl(' + this.shade + ',100%,' + i + '%)'
                        ctx.arc(point.x, point.y, 1, 0, PI2, false)
                        ctx.fill()
                    }
                } else {
                    ctx.beginPath()
                    ctx.fillStyle = 'hsl(' + this.shade + ',100%,50%)'
                    ctx.arc(this.x, this.y, 1, 0, PI2, false)
                    ctx.fill()
                }
            }
        }

        let canvas = document.getElementById('birthday')
        let ctx = canvas.getContext('2d')
        let then = timestamp()
        let birthday = new Birthday
        window.onresize = () => birthday.resize()
        document.onclick = evt => birthday.onClick(evt)
        document.ontouchstart = evt => birthday.onClick(evt)
            ; (function loop() {
                requestAnimationFrame(loop)
                let now = timestamp()
                let delta = now - then
                then = now
                birthday.update(delta / 1000)
            })()
    </script>
</body>

</html>