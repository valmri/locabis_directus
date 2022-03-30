const data = null;

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    console.log(this.responseText);
  }
});

xhr.open("GET", "http://172.24.2.143:8055/items/appartement?filter=&fields=image%2Cidtype%2Cidimm.ville%5Bfields%5D%5Bimage%5D%5B_eq%5D%3Dnull");

xhr.send(data);