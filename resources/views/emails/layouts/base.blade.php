<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="color-scheme" content="light">
  <meta name="supported-color-schemes" content="light">
  <title>{{ config('app.name') }} - @yield('title')</title>

  <style>
    /* Base styles */
    body {
      margin: 0;
      padding: 0;
      width: 100%;
      background-color: #f3f4f6;
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    /* Container */
    .email-wrapper {
      width: 100%;
      margin: 0;
      padding: 0;
      background-color: #f3f4f6;
      -premailer-width: 100%;
      -premailer-cellpadding: 0;
      -premailer-cellspacing: 0;
    }

    .email-content {
      width: 100%;
      max-width: 600px;
      margin: 0 auto;
      padding: 0;
      background-color: #ffffff;
    }

    /* Header */
    .email-header {
      padding: 25px 0;
      text-align: center;
      background-color: #ffffff;
    }

    .email-header img {
      width: auto;
      height: 48px;
    }

    /* Body */
    .email-body {
      width: 100%;
      margin: 0;
      padding: 32px;
      background-color: #ffffff;
      border-bottom: 1px solid #e5e7eb;
    }

    /* Footer */
    .email-footer {
      width: 100%;
      margin: 0;
      padding: 32px;
      text-align: center;
      background-color: #ffffff;
    }

    /* Typography */
    h1 {
      margin-top: 0;
      color: #111827;
      font-size: 24px;
      font-weight: bold;
      text-align: left;
    }

    h2 {
      margin-top: 0;
      color: #111827;
      font-size: 20px;
      font-weight: bold;
    }

    h3 {
      margin-top: 0;
      color: #111827;
      font-size: 16px;
      font-weight: bold;
    }

    p {
      margin-top: 0;
      color: #374151;
      font-size: 16px;
      line-height: 1.5em;
    }

    /* Data Display */
    .data-row {
      margin-bottom: 8px;
    }

    .data-label {
      color: #6b7280;
      font-size: 14px;
    }

    .data-value {
      color: #111827;
      font-size: 16px;
      font-weight: 500;
    }

    /* Buttons */
    .button {
      display: inline-block;
      padding: 12px 24px;
      background-color: #4f46e5;
      color: #ffffff;
      font-size: 16px;
      font-weight: 600;
      text-decoration: none;
      border-radius: 6px;
    }

    /* Responsive */
    @media only screen and (max-width: 600px) {
      .email-content {
        width: 100% !important;
      }

      .email-body {
        padding: 24px !important;
      }
    }

    /* Email client specific */
    [data-ogsc] .button {
      background-color: #4f46e5 !important;
    }
  </style>
</head>
<body>
<table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
  <tr>
    <td align="center">
      <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <!-- Header -->
        <tr>
          <td class="email-header">
            <a href="{{ config('app.url') }}" target="_blank">
              <img src="{{ asset('firstmark_logo.svg') }}" alt="{{ config('app.name') }} Logo">
            </a>
          </td>
        </tr>

        <!-- Body -->
        <tr>
          <td class="email-body">
            @yield('content')
          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td class="email-footer">
            <p style="color: #6b7280; font-size: 14px;">
              &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </p>

            <p style="color: #6b7280; font-size: 14px;">
              Infinity Complex <br>
              Sir Glyn Jones Road <br>
              Before Lilongwe Water Board
              Area 3, Lilongwe, Malawi<br>
              T.: +265 996 727 163<br>
              E.: sales@firstmarkmw.com
            </p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
