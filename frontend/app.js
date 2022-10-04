import express from "express";
import router from './routes/index.js';
import path from 'path';
import { fileURLToPath } from "url";

// set up the root directory reference
// find the global URL using fileURLToPath
// and then turn that into the __dirname
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

console.log(__dirname);

const app = express();
const port = process.env.PORT || 3000;
// this is where we connect into the "server"

app.use(express.static(path.join(__dirname, "public")));

app.use('/', router)

app.listen(port, () => {
  console.log(`App is running at ${port}/`);
});