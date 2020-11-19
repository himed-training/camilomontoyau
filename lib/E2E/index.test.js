const puppeteer = require("puppeteer");

const procesoPupeteer = async () => {
  const browser = await puppeteer.launch({ headless: false });
  const page = await browser.newPage();
  await page.goto("http://localhost:8080/consulta.html");
  await page.focus("#txtID");
  await page.keyboard.type("1234567890");
  await page.focus("#txtNom");
  await page.keyboard.type("Camilo");
  await page.focus("#txtApll");
  await page.keyboard.type("Montoya");
  await page.select("#slbTipo", "TI");
  await page.click("#btnEnviar");
  await browser.close();
};

procesoPupeteer();
