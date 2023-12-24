<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
</head>
<style>
    .desktop {
        background-color: #ebf9ff;
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: 100%;
    }

    .desktop .div {
        background-color: #ebf9ff;
        overflow: hidden;
        width: 1440px;
        height: 2637px;
        position: relative;
    }

    .desktop .tools {
        position: absolute;
        width: 320px;
        height: 286px;
        top: 1118px;
        left: 1074px;
    }

    .desktop .text-wrapper {
        position: absolute;
        top: 0;
        left: 58px;
        font-family: "Inter", Helvetica;
        font-weight: 700;
        color: #000000;
        font-size: 30px;
        letter-spacing: 0;
        line-height: normal;
        white-space: nowrap;
    }

    .desktop .viral {
        position: absolute;
        width: 320px;
        height: 30px;
        top: 256px;
        left: 0;
    }

    .desktop .text-wrapper-2 {
        position: absolute;
        top: 0;
        left: 25px;
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #000000;
        font-size: 20px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .line {
        top: 0;
        left: 24px;
        position: absolute;
        width: 292px;
        height: 1px;
        object-fit: cover;
    }

    .desktop .text-wrapper-3 {
        position: absolute;
        top: 0;
        left: 0;
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #000000;
        font-size: 20px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .viral-2 {
        width: 322px;
        top: 204px;
        position: absolute;
        height: 30px;
        left: 0;
    }

    .desktop .img {
        position: absolute;
        width: 292px;
        height: 1px;
        top: 0;
        left: 25px;
        object-fit: cover;
    }

    .desktop .viral-3 {
        width: 322px;
        top: 153px;
        position: absolute;
        height: 30px;
        left: 0;
    }

    .desktop .overlap-group {
        position: absolute;
        width: 292px;
        height: 30px;
        top: 0;
        left: 25px;
    }

    .desktop .line-2 {
        top: 0;
        left: 0;
        position: absolute;
        width: 292px;
        height: 1px;
        object-fit: cover;
    }

    .desktop .viral-4 {
        width: 322px;
        top: 102px;
        position: absolute;
        height: 30px;
        left: 0;
    }

    .desktop .viral-5 {
        width: 320px;
        top: 51px;
        position: absolute;
        height: 30px;
        left: 0;
    }

    .desktop .line-3 {
        top: -1px;
        left: 24px;
        position: absolute;
        width: 292px;
        height: 1px;
        object-fit: cover;
    }

    .desktop .top-navbar {
        position: absolute;
        width: 1448px;
        height: 114px;
        top: 0;
        left: 0;
    }

    .desktop .overlap {
        position: relative;
        width: 1440px;
        height: 114px;
        background-color: #2693c9;
    }

    .desktop .icon-profile-circle {
        position: absolute;
        width: 50px;
        height: 50px;
        top: 32px;
        left: 1370px;
    }

    .desktop .text-wrapper-4 {
        position: absolute;
        top: 35px;
        left: 32px;
        font-family: "Poppins", Helvetica;
        font-weight: 600;
        background-color: transparent;
        color: white;
        border: none;
        font-size: 24px;
        text-align: center;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-5 {
        position: absolute;
        width: 90px;
        top: 35px;
        left: 137px;
        font-family: "Poppins", Helvetica;
        font-weight: 600;
        background-color: transparent;
        color: white;
        border: none;
        font-size: 24px;
        text-align: center;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-6 {
        position: absolute;
        top: 35px;
        left: 242px;
        font-family: "Poppins", Helvetica;
        font-weight: 600;
        background-color: transparent;
        color: white;
        border: none;
        font-size: 24px;
        text-align: center;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-7 {
        position: absolute;
        top: 20px;
        left: 552px;
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #ebf9ff;
        font-size: 60px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .list-item-wrapper {
        position: absolute;
        width: 876px;
        height: 1128px;
        top: 1095px;
        left: 73px;
        background-color: #2693c9;
    }

    .desktop .list-item {
        position: relative;
        width: 797px;
        height: 1038px;
        top: 59px;
        left: 41px;
    }

    .desktop .item {
        position: absolute;
        width: 800px;
        height: 174px;
        top: 0;
        left: 3px;
    }

    .desktop .rectangle {
        width: 285px;
        height: 174px;
        top: 0;
        object-fit: cover;
        position: absolute;
        left: 0;
    }

    .desktop .p {
        position: absolute;
        top: 20px;
        left: 314px;
        font-family: "Inter", Helvetica;
        font-weight: 700;
        color: #ebf9ff;
        font-size: 28px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-8 {
        position: absolute;
        width: 480px;
        height: 48px;
        top: 69px;
        left: 314px;
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #ebf9ff;
        font-size: 14px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .by-APIP-CHINA {
        position: absolute;
        height: 21px;
        top: 142px;
        left: 314px;
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #ebf9ff;
        font-size: 14px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .span {
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        color: #ebf9ff;
        font-size: 14px;
        letter-spacing: 0;
    }

    .desktop .text-wrapper-9 {
        font-weight: 700;
    }

    .desktop .item-2 {
        top: 216px;
        left: 3px;
        position: absolute;
        width: 800px;
        height: 174px;
    }

    .desktop .item-3 {
        top: 432px;
        left: 0;
        position: absolute;
        width: 800px;
        height: 174px;
    }

    .desktop .item-4 {
        top: 648px;
        left: 0;
        position: absolute;
        width: 800px;
        height: 174px;
    }

    .desktop .item-5 {
        top: 864px;
        left: 0;
        position: absolute;
        width: 800px;
        height: 174px;
    }

    .desktop .headline {
        position: absolute;
        width: 1296px;
        height: 789px;
        top: 190px;
        left: 73px;
    }

    .desktop .overlap-2 {
        position: relative;
        width: 1294px;
        height: 789px;
        background-image: url(./img/rectangle-3.png);
        background-size: cover;
        background-position: 50% 50%;
    }

    .desktop .rectangle-2 {
        width: 1294px;
        height: 241px;
        top: 548px;
        background: linear-gradient(180deg,
                rgba(0, 0, 0, 0.56) 6.1%,
                rgba(21.25, 21.25, 21.25, 0.3) 53.88%,
                rgba(217, 217, 217, 0) 100%);
        position: absolute;
        left: 0;
    }

    .desktop .tagline {
        position: absolute;
        width: 105px;
        height: 44px;
        top: 604px;
        left: 96px;
    }

    .desktop .div-wrapper {
        position: relative;
        width: 103px;
        height: 44px;
        background-color: #2693c9;
        border-radius: 26px;
    }

    .desktop .text-wrapper-10 {
        position: absolute;
        width: 51px;
        height: 31px;
        top: 6px;
        left: 26px;
        font-family: "Poppins", Helvetica;
        font-weight: 600;
        color: #ebf9ff;
        font-size: 25px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-11 {
        position: absolute;
        width: 1133px;
        height: 89px;
        top: 669px;
        left: 96px;
        font-family: "Poppins", Helvetica;
        font-weight: 600;
        color: #ffffff;
        font-size: 30px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .bottom-navbar {
        position: absolute;
        width: 1440px;
        height: 305px;
        top: 2332px;
        left: 0;
    }

    .desktop .frame {
        height: 231px;
        top: 0;
        background-color: #386fa4;
        position: absolute;
        width: 1440px;
        left: 0;
    }

    .desktop .logo {
        position: absolute;
        width: 371px;
        height: 94px;
        top: 68px;
        left: 92px;
    }

    .desktop .FB-IMG {
        position: absolute;
        width: 94px;
        height: 94px;
        top: 0;
        left: 0;
        object-fit: cover;
    }

    .desktop .text-wrapper-12 {
        position: absolute;
        width: 248px;
        top: 23px;
        left: 122px;
        font-family: "Inter", Helvetica;
        font-weight: 700;
        color: #dde6ed;
        font-size: 40px;
        text-align: center;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .kontak {
        position: absolute;
        width: 185px;
        height: 114px;
        top: 58px;
        left: 885px;
    }

    .desktop .overlap-group-2 {
        position: relative;
        width: 183px;
        height: 114px;
    }

    .desktop .kontak-2 {
        position: absolute;
        top: 0;
        left: 0;
        font-family: "Inter", Helvetica;
        font-weight: 400;
        color: #dde6ed;
        font-size: 16px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-13 {
        font-weight: 500;
    }

    .desktop .text-wrapper-14 {
        font-family: "Inter", Helvetica;
        font-weight: 400;
        color: #dde6ed;
        font-size: 16px;
        letter-spacing: 0;
    }

    .desktop .telephone {
        position: absolute;
        width: 20px;
        height: 20px;
        top: 38px;
        left: 0;
        object-fit: cover;
    }

    .desktop .mail {
        position: absolute;
        width: 20px;
        height: 20px;
        top: 76px;
        left: 0;
        object-fit: cover;
    }

    .desktop .media-social {
        position: absolute;
        width: 278px;
        height: 107px;
        top: 62px;
        left: 1113px;
    }

    .desktop .media-sosial-ikuti {
        position: absolute;
        top: 0;
        left: 0;
        font-family: "Inter", Helvetica;
        font-weight: 400;
        color: #dde6ed;
        font-size: 15px;
        letter-spacing: 0;
        line-height: normal;
    }

    .desktop .text-wrapper-15 {
        font-family: "Inter", Helvetica;
        font-weight: 400;
        color: #dde6ed;
        font-size: 15px;
        letter-spacing: 0;
    }

    .desktop .instagram {
        position: absolute;
        width: 24px;
        height: 24px;
        top: 83px;
        left: 0;
        object-fit: cover;
    }

    .desktop .facebook {
        position: absolute;
        width: 24px;
        height: 24px;
        top: 83px;
        left: 43px;
        object-fit: cover;
    }

    .desktop .twitter {
        position: absolute;
        width: 24px;
        height: 24px;
        top: 83px;
        left: 86px;
        object-fit: cover;
    }

    .desktop .frame-2 {
        height: 74px;
        top: 231px;
        background-color: #59a5d8;
        position: absolute;
        width: 1440px;
        left: 0;
    }

    .desktop .text-wrapper-16 {
        position: absolute;
        top: 24px;
        left: 424px;
        font-family: "Inter", Helvetica;
        font-weight: 400;
        color: #ffffff;
        font-size: 20px;
        letter-spacing: 0;
        line-height: normal;
        white-space: nowrap;
    }
</style>

<body>
    <div class="desktop">
        <div class="div">
            <div class="top-navbar">
                <div class="overlap">
                    <img class="icon-profile-circle" src="img/icon-profile-circle.png" />
                    <button class="text-wrapper-4">Home</button>
                    <button class="text-wrapper-5">News</button>
                    <button class="text-wrapper-6">About</button>
                    <div class="text-wrapper-7">GAME NEWS</div>
                </div>
            </div>
            <div class="tools">
                <div class="text-wrapper">Trending</div>
                <div class="viral">
                    <div class="text-wrapper-2">Apip suka kontol udah sih</div>
                    <img class="line" src="img/line-1-2.svg" />
                    <div class="text-wrapper-3">E.</div>
                </div>
                <div class="viral-2">
                    <div class="text-wrapper-2">Apip suka kontol austra</div>
                    <img class="img" src="img/line-1-2.svg" />
                    <div class="text-wrapper-3">D.</div>
                </div>
                <div class="viral-3">
                    <div class="overlap-group">
                        <div class="text-wrapper-3">Apip suka kontol jerman</div>
                        <img class="line-2" src="img/line-1-2.svg" />
                    </div>
                    <div class="text-wrapper-3">C.</div>
                </div>
                <div class="viral-4">
                    <div class="text-wrapper-2">Apip suka kontol china</div>
                    <img class="img" src="img/line-1-3.svg" />
                    <div class="text-wrapper-3">B.</div>
                </div>
                <div class="viral-5">
                    <div class="text-wrapper-2">Apip suka kontol</div>
                    <img class="line-3" src="img/line-1-4.svg" />
                    <div class="text-wrapper-3">A.</div>
                </div>
            </div>
            <div class="list-item-wrapper">
                <div class="list-item">
                    <div class="item">
                        <img class="rectangle" src="img/rectangle-7-4.png" />
                        <p class="p">Apip Berkontol kontol kontol kontol</p>
                        <p class="text-wrapper-8">
                            Apip China, Brian Anjing, Rangga Jerman, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor.
                        </p>
                        <p class="by-APIP-CHINA"><span class="span">By </span> <span class="text-wrapper-9">APIP CHINA</span></p>
                    </div>
                    <div class="item-2">
                        <img class="rectangle" src="img/rectangle-7-4.png" />
                        <p class="p">Apip Berkontol kontol kontol kontol</p>
                        <p class="text-wrapper-8">
                            Apip China, Brian Anjing, Rangga Jerman, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor.
                        </p>
                        <p class="by-APIP-CHINA"><span class="span">By </span> <span class="text-wrapper-9">APIP CHINA</span></p>
                    </div>
                    <div class="item-3">
                        <img class="rectangle" src="img/rectangle-7-4.png" />
                        <p class="p">Apip Berkontol kontol kontol kontol</p>
                        <p class="text-wrapper-8">
                            Apip China, Brian Anjing, Rangga Jerman, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor.
                        </p>
                        <p class="by-APIP-CHINA"><span class="span">By </span> <span class="text-wrapper-9">APIP CHINA</span></p>
                    </div>
                    <div class="item-4">
                        <img class="rectangle" src="img/rectangle-7-4.png" />
                        <p class="p">Apip Berkontol kontol kontol kontol</p>
                        <p class="text-wrapper-8">
                            Apip China, Brian Anjing, Rangga Jerman, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor.
                        </p>
                        <p class="by-APIP-CHINA"><span class="span">By </span> <span class="text-wrapper-9">APIP CHINA</span></p>
                    </div>
                    <div class="item-5">
                        <img class="rectangle" src="img/rectangle-7-4.png" />
                        <p class="p">Apip Berkontol kontol kontol kontol</p>
                        <p class="text-wrapper-8">
                            Apip China, Brian Anjing, Rangga Jerman, Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor.
                        </p>
                        <p class="by-APIP-CHINA"><span class="span">By </span> <span class="text-wrapper-9">APIP CHINA</span></p>
                    </div>
                </div>
            </div>
            <div class="headline">
                <div class="overlap-2">
                    <div class="rectangle-2"></div>
                    <div class="tagline">
                        <div class="div-wrapper">
                            <div class="text-wrapper-10">RPG</div>
                        </div>
                    </div>
                    <p class="text-wrapper-11">APIP CHINA, TIOVA BOKEP, RANGGA JERMAN. HOBI MEREKA NGEGAY. ASTAGFIRULLAH</p>
                </div>
            </div>
            <div class="bottom-navbar">
                <div class="frame">
                    <div class="logo">
                        <img class="FB-IMG" src="img/fb-img-1517538939679-1.png" />
                        <div class="text-wrapper-12">INFO GAME</div>
                    </div>
                    <div class="kontak">
                        <div class="overlap-group-2">
                            <p class="kontak-2">
                                <span class="text-wrapper-13">Kontak<br /></span>
                                <span class="text-wrapper-14"><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+6283154318876<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;vallov@infgame.com<br /></span>
                            </p>
                            <img class="telephone" src="img/telephone-1.png" />
                            <img class="mail" src="img/mail-1.png" />
                        </div>
                    </div>
                    <div class="media-social">
                        <p class="media-sosial-ikuti">
                            <span class="text-wrapper-13">Media sosial<br /></span>
                            <span class="text-wrapper-15"><br />Ikuti jejaring sosial untuk mendapatkan<br />informasi terbaru</span>
                        </p>
                        <img class="instagram" src="img/instagram-1.png" />
                        <img class="facebook" src="img/facebook-1.png" />
                        <img class="twitter" src="img/twitter-1.png" />
                    </div>
                </div>
                <div class="frame-2">
                    <p class="text-wrapper-16">Hak Cipta © 2014 - 2023. Semua hak dilindungi oleh InfoGame</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>