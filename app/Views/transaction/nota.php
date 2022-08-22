<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota - </title>

    <style type="text/css">
        body {
            font-size: 11px;
            font-family: sans-serif;

            /* margin-top: 0.5cm; */
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 2cm;
        }

        p {
            font-size: 11px;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .italic {
            font-style: italic;
        }

        .border {
            border-collapse: collapse;
            border: 1px solid #333333;
        }

        .border-bottom {
            border-bottom: 1px solid black;
        }

        th {
            font-size: 11px;
            text-align: center;
            padding: 4px 4px;
        }

        td {
            font-size: 11px;
            padding: 4px 4px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .valign-top {
            vertical-align: top;
        }

        header {
            position: fixed;
            top: 1cm;
            left: 1cm;
            right: 1cm;
            height: 2cm;
        }

        header .row {
            border: 4px solid #333333;
        }

        /* header table {
            border: 4x solid #333333;
        } */

        header h1 {
            font-size: 24px;
            font-weight: 700;
            vertical-align: top;
        }

        header h1 span {
            margin-top: 0px;
        }

        header h2 {
            font-size: 19px;
            font-weight: bold;
        }

        header h2 span {
            margin-top: 0px;
        }

        header h3 {
            font-size: 16px;
            font-weight: 900;
            text-align: right;
        }

        main .supplier {
            margin-top: 20px;
        }

        main .supplier .box span {
            font-size: 24px;
        }

        footer {
            position: fixed;
            bottom: 6.5cm;
            left: 1cm;
            right: 1cm;
            height: 2cm;
        }

        footer .sign h1 {
            font-size: 14px;
            font-weight: bold;
        }

        footer .sign td {
            font-size: 12px;
        }

        footer .vpadding-sign {
            padding-bottom: 18px;
            padding-top: 18px
        }

        footer .hpadding-logistic {
            padding-left: 29px;
            padding-right: 29px;
        }

        footer .hpadding-controller {
            padding-left: 19px;
            padding-right: 19px;
        }

        footer .hpadding-driver {
            padding-left: 39px;
            padding-right: 39px;
        }

        footer .hpadding-receiver {
            padding-left: 29px;
            padding-right: 29px;
        }

        @page {
            margin: 0cm 0cm;
        }

        main {
            margin-top: 0px;
        }

        .page-break {
            page-break-after: always;
        }

        address {
            margin-left: 25px;
        }

        .font14 {
            font-size: 14px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main style="left: 0cm !important; right:0cm !important;">
        <table width="100%" border="0">
            <tr>
                <td width="60%">
                    <h1 class="bold">KAS BON</h1>
                </td>
            </tr>
        </table>
        <table width="100%" class="border">
            <tr>
                <td width="15%">
                    <h2>No </h2>
                </td>
                <td width="85%">
                    <h2> 001/01/20</h2>
                </td>
            </tr>
            <tr>
                <td width="15%">
                    <h2>Nilai</h2>
                </td>
                <td>
                    <h1>Rp. <?= number_format(100000, 2) ?></h1>
                </td>
            </tr>
        </table>
    </main>
</body>

</html>