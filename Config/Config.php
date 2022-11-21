<?php
    const BASE_URL = 'http://apirestconsult.offline/';

    const DB_HOST = 'localhost';
    //const DB_NAME = 'hayagrou_apirestconsult';
    const DB_NAME = 'apirestconsult';
    //const DB_USER = 'hayagrou_jmpipah';
    const DB_USER = 'root';
    const DB_PASSWORD = '';
    //const DB_PASSWORD = '(*H5^bDJb4cM';
    const DB_CHARSET = 'charset=utf8';

    /**ZONA HORARIA */
    date_default_timezone_set("America/Lima");    

    const SPD = ".";
    const SPM = ",";

    const SMONEY = "S/. ";
    const TAXES = 0.18;

    const NAME_SENDER = "Soporte HGT";
    const EMAIL_SENDER = "noreply@hayagroup.pe";
    const ENTERPRISE_WEB = "https://hayagoup.pe";
    const ENTERPRISE_NAME = "HAYA GROUP TECHNOLOGY";

    /**DATOS PARA ENCRIPTAR Y DESENCRIPTAR */
    const KEY = 'genesis';
    const METHODENCRIPT = "AES-128-ECB";

    // RUTA para consultar RUC/DNI
    const URL_CONSULT_API = "";

    /**Padron Recudido SUNAT */
    const URL_PADRON_RECUDIDO = BASE_URL."assets/data/padron_reducido_ruc.txt";

