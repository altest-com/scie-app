<?php

function validarCurp($curp) {
    $curpRegex = '/^[A-Z]{1}[AEIOUX]{1}[A-ZX]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM]{1}(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[B-DF-HJ-NP-TV-Z]{3}[0-9A-Z]{1}[0-9]{1}/';
    return (preg_match($curpRegex, strtoupper($curp))) ? true : false;
}

function validarRfc($rfc) {
    $rfcRegex = '/^[A-Z]{1}[AEIOUX]{1}[A-ZX]{2}[0-9]{2}(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[0-9A-Z]{3}/';
    return (preg_match($rfcRegex, strtoupper($rfc))) ? true : false;
}
