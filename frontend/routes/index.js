import express from 'express';
import path from 'path';
import { fileURLToPath } from "url";

const router = express.Router();
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

router.get('/', (req, res) => {
    // req - when we get a request
    // res - respond with:
    console.log("index!");
    res.sendFile(path.join(__dirname, '../views/index.html'));
})

router.get('/donate', (req, res) => {
    // req - when we get a request
    // res - respond with:
    console.log("DONATE!");
    res.sendFile(path.join(__dirname, '../views/donate.html'));
})

router.get('/events', (req, res) => {
    // req - when we get a request
    // res - respond with:
    console.log("EVENTS!");
    res.sendFile(path.join(__dirname, '../views/events.html'));
})

router.get('/goals', (req, res) => {
    // req - when we get a request
    // res - respond with:
    console.log("GOALS!");
    res.sendFile(path.join(__dirname, '../views/goals.html'));
})

router.use((req, res) => {
    console.log('page does not exist');
    res.sendFile(path.join(__dirname, '../views/404.html'));
})

export default router;