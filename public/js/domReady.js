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

export { domReady };
