let domReady = () => {
  return new Promise((resolve, reject) => {
    (document.readyState) || reject("Can't resolve document readystate");
    let listener;
    (/d$|^i|^c/).test(document.readyState) ? resolve() : document.addEventListener("DOMContentLoaded", listener = event => {
      document.removeEventListener("DOMContentLoaded", listener);
      resolve();
    });
  });
}

function fill(event, word_id) {
let blank = document.getElementById('fill-'+word_id);
/* let form = document.forms[1];
let radios = form.elements[word_id];
await delay(100); */
blank.innerHTML = event.textContent;
console.log(event.textContent);
}

domReady().then(msg => {
  console.log('DOM has loaded');
}, err => {
  console.log(err);
});