const puppeteer = require("puppeteer");

const procesoPupeteer = async () => {
  const browser = await puppeteer.launch({ headless: false });
  const page = await browser.newPage();
  await page.goto("http://localhost:8080/consulta.html");
  await page.focus("#txtID");
  page.keyboard.type("1234567890");
  await page.focus("#txtNom");
  page.keyboard.type("Camilo");
  await page.focus("#txtApll");
  page.keyboard.type("Montoya");
  // click en el boton

  await browser.close();
};

procesoPupeteer();
