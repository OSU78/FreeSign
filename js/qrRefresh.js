
var content = "https://edusign.app/student/";
var date = new Date();

console.log(date.getSeconds());
// expected output: 18
var imgdQR = document.getElementById('QR');
//imgdQR.src= "qr.PNG";

function DynamicQr() {
    const xml = new XMLHttpRequest();
    xml.open('GET', 'html/getQr.php?Content='+content+date.getSeconds());
    xml.onreadystatechange = function listeA() {

        if (xml.readyState === 4) {
           // console.log(date.getSeconds());
            var imgQR = document.getElementById('QR');
            imgQR.src = "http://devweb-iris-2021/QR-CODE%20GEN/html/"+JSON.parse(xml.responseText).url+"?i="+Math.floor(Math.random() * 855); ;
            console.log(imgQR.src);
        }
    };
    xml.send();
}
DynamicQr();
setInterval(DynamicQr, 3200);

