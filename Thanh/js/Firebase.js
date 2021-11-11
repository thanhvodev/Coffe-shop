// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyDsEuKlKNPZsHHFG6fobccCtuwdpQZOsH8",
    authDomain: "fire9db-7325b.firebaseapp.com",
    projectId: "fire9db-7325b",
    storageBucket: "fire9db-7325b.appspot.com",
    messagingSenderId: "131239699340",
    appId: "1:131239699340:web:66870bb5e35600cdc5aca9"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

import { getDatabase, ref, get, set, child, update, remove }
    from "https://www.gstatic.com/firebasejs/9.4.0/firebase-database.js";

const db = getDatabase();

var namebox = document.getElementById("Namebox");
var rollbox = document.getElementById("Rollbox");
var secbox = document.getElementById("Secbox");
var genbox = document.getElementById("Genbox");

var insBtn = document.getElementById("Insbtn");