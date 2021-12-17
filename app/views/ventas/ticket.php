<?php
if(!estaLogueado()){
    redirigir('/usuarios/login');
}
console($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaner</title>
    <script src="<?= URLROOT; ?>/js/tailwindcss.min.js"></script>
    <link rel="shortcut icon" type="image/svg" href="<?= URLROOT; ?>/favicon.svg" />
</head>

<body>
<div class="min-h-screen bg-gray-50 py-6 flex flex-col justify-center relative overflow-hidden sm:py-12">
  <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 sm:max-w-lg sm:mx-auto sm:rounded-lg sm:px-10">
    <div class="max-w-md mx-auto">
      <div class="divide-y divide-gray-300/50">
        <div class="flex-none pb-8 h-32 mt-auto rounded flex flex-col items-center justify-center">
          <svg xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" version="1.1">
            <defs>
              <linearGradient x1="0.99999994" y1="1.0000001" x2="0" y2="0" id="gradient_1">
                <stop offset="0" stop-color="#555555"/>
                <stop offset="1" stop-color="#cdcdcd"/>
              </linearGradient>
              <rect width="1024" height="1024" id="artboard_1"/>
              <clipPath id="clip_1">
                  <use xlink:href="#artboard_1" clip-rule="evenodd"/>
              </clipPath>
            </defs>
            <g id="Custom-Preset-2" clip-path="url(#clip_1)">
              <use xlink:href="#artboard_1" stroke="none" fill="#FFFFFF"/>
              <path d="M414.5 0C414.5 -3.62367e-05 414.5 -3.62367e-05 414.5 -3.62367e-05C439.539 0.0877444 464.579 0.0250861 489.617 0.263306C501.494 0.376308 513.37 0.661064 525.241 1.05359C534.623 1.36381 544.002 1.80349 553.372 2.3714C561.406 2.8583 569.432 3.4731 577.446 4.21768C584.583 4.8808 591.709 5.67189 598.818 6.59387C605.292 7.43361 611.751 8.40183 618.186 9.50186C624.136 10.519 630.065 11.6652 635.965 12.944C660.917 18.3527 685.461 26.3343 708.078 38.2986C712.087 40.419 716.031 42.6661 719.897 45.0367C723.673 47.352 727.375 49.7911 730.991 52.3491C738.073 57.3593 744.802 62.8228 751.143 68.7434C760.62 77.5922 769.161 87.4233 776.649 98.0068C787.336 113.111 795.847 129.676 802.49 146.926C808.253 161.893 812.659 177.365 816.055 193.031C820.236 212.318 822.957 231.907 824.782 251.549C826.383 268.782 827.375 286.478 827.946 303.752C828.339 315.622 828.624 327.497 828.737 339.374C828.975 364.415 828.912 389.458 829 414.5C829 414.5 829 414.5 829 414.5C828.912 439.539 828.975 464.579 828.737 489.617C828.624 501.494 828.339 513.37 827.946 525.241C827.375 542.512 826.383 560.216 824.782 577.446C822.957 597.088 820.237 616.677 816.056 635.965C812.66 651.632 808.254 667.103 802.491 682.071C795.848 699.321 787.337 715.886 776.651 730.991C769.163 741.574 760.622 751.406 751.145 760.255C744.804 766.176 738.075 771.639 730.993 776.649C727.378 779.207 723.675 781.646 719.9 783.962C716.034 786.332 712.089 788.579 708.081 790.7C685.464 802.664 660.92 810.646 635.969 816.055C630.069 817.334 624.14 818.48 618.19 819.497C611.755 820.597 605.296 821.566 598.822 822.405C591.714 823.327 584.588 824.119 577.451 824.782C569.437 825.526 561.411 826.141 553.378 826.628C544.008 827.196 534.63 827.636 525.248 827.946C513.378 828.339 501.503 828.623 489.626 828.736C464.585 828.975 439.542 828.912 414.5 829C414.5 829 414.5 829 414.5 829C389.461 828.912 364.421 828.975 339.383 828.737C327.506 828.624 315.63 828.339 303.759 827.946C294.376 827.636 284.998 827.196 275.628 826.629C267.594 826.142 259.567 825.527 251.554 824.782C244.417 824.119 237.29 823.328 230.182 822.406C223.708 821.566 217.249 820.598 210.814 819.498C204.864 818.481 198.934 817.335 193.035 816.056C168.083 810.647 143.539 802.666 120.921 790.701C116.913 788.581 112.969 786.334 109.103 783.963C105.327 781.648 101.625 779.209 98.009 776.651C90.927 771.64 84.1983 766.177 77.8571 760.256C68.3803 751.408 59.8384 741.576 52.3508 730.993C41.664 715.888 33.1529 699.324 26.5102 682.073C20.7467 667.106 16.3409 651.635 12.9449 635.969C8.76401 616.682 6.04326 597.093 4.21814 577.451C2.61705 560.22 1.62499 542.519 1.0538 525.248C0.661244 513.377 0.376437 501.502 0.263428 489.626C0.0251499 464.585 0.0877972 439.542 -1.81184e-05 414.5C-1.81184e-05 414.5 -1.81184e-05 414.5 -1.81184e-05 414.5C0.0877565 389.461 0.0250895 364.421 0.263306 339.382C0.376305 327.505 0.661062 315.63 1.05359 303.758C1.36381 294.376 1.80349 284.998 2.3714 275.628C2.8583 267.594 3.4731 259.568 4.21768 251.554C4.88082 244.417 5.67194 237.29 6.59393 230.182C7.43366 223.708 8.40185 217.249 9.50189 210.814C10.519 204.864 11.6653 198.934 12.9441 193.035C18.3528 168.083 26.3343 143.539 38.2986 120.922C40.419 116.913 42.6661 112.969 45.0367 109.103C47.352 105.327 49.7911 101.625 52.3491 98.0091C57.359 90.9277 62.8233 84.1976 68.7436 77.857C77.5923 68.38 87.4236 59.8384 98.0069 52.3507C113.112 41.6641 129.676 33.1529 146.926 26.5102C161.893 20.7468 177.365 16.3408 193.032 12.9448C212.319 8.76395 231.907 6.04322 251.549 4.21811C268.78 2.61697 286.48 1.62501 303.752 1.0538C315.622 0.661247 327.497 0.376434 339.374 0.263428C364.415 0.0251536 389.458 0.0878092 414.5 0Z" transform="translate(98 98)" id="Rectangle" fill="url(#gradient_1)" fill-rule="evenodd" stroke="none"/>
              <path d="M29.999 0L450.201 0Q450.937 0 451.673 0.0361351Q452.408 0.0722702 453.141 0.144453Q453.874 0.216636 454.603 0.324694Q455.331 0.432751 456.053 0.576422Q456.776 0.720093 457.49 0.899032Q458.204 1.07797 458.909 1.29175Q459.614 1.50552 460.307 1.75362Q461.001 2.00172 461.681 2.28354Q462.361 2.56536 463.027 2.88022Q463.693 3.19509 464.342 3.54224Q464.992 3.8894 465.623 4.268Q466.255 4.6466 466.867 5.05574Q467.48 5.46488 468.071 5.90358Q468.663 6.34227 469.232 6.80946Q469.801 7.27665 470.347 7.77121Q470.893 8.26577 471.413 8.7865Q471.934 9.30724 472.429 9.8529Q472.923 10.3986 473.39 10.9678Q473.858 11.5371 474.296 12.1286Q474.735 12.7201 475.144 13.3324Q475.553 13.9448 475.932 14.5764Q476.31 15.2081 476.658 15.8576Q477.005 16.507 477.32 17.1728Q477.635 17.8385 477.916 18.5189Q478.198 19.1993 478.446 19.8926Q478.694 20.586 478.908 21.2908Q479.122 21.9955 479.301 22.7098Q479.48 23.4242 479.623 24.1465Q479.767 24.8688 479.875 25.5972Q479.983 26.3257 480.055 27.0586Q480.128 27.7915 480.164 28.527Q480.2 29.2626 480.2 29.999L480.2 317.801Q480.2 318.537 480.164 319.273Q480.128 320.009 480.055 320.741Q479.983 321.474 479.875 322.203Q479.767 322.931 479.623 323.653Q479.48 324.376 479.301 325.09Q479.122 325.804 478.908 326.509Q478.694 327.214 478.446 327.907Q478.198 328.601 477.916 329.281Q477.635 329.961 477.32 330.627Q477.005 331.293 476.658 331.942Q476.31 332.592 475.932 333.224Q475.553 333.855 475.144 334.467Q474.735 335.08 474.296 335.671Q473.858 336.263 473.39 336.832Q472.923 337.401 472.429 337.947Q471.934 338.493 471.413 339.013Q470.893 339.534 470.347 340.029Q469.801 340.523 469.232 340.991Q468.663 341.458 468.071 341.896Q467.48 342.335 466.867 342.744Q466.255 343.153 465.623 343.532Q464.992 343.911 464.342 344.258Q463.693 344.605 463.027 344.92Q462.361 345.235 461.681 345.516Q461.001 345.798 460.307 346.046Q459.614 346.294 458.909 346.508Q458.204 346.722 457.49 346.901Q456.776 347.08 456.053 347.224Q455.331 347.367 454.603 347.475Q453.874 347.583 453.141 347.656Q452.408 347.728 451.673 347.764Q450.937 347.8 450.201 347.8L29.999 347.8Q29.2626 347.8 28.527 347.764Q27.7915 347.728 27.0586 347.656Q26.3257 347.583 25.5972 347.475Q24.8688 347.367 24.1465 347.224Q23.4242 347.08 22.7098 346.901Q21.9955 346.722 21.2907 346.508Q20.586 346.294 19.8926 346.046Q19.1993 345.798 18.5189 345.516Q17.8385 345.235 17.1728 344.92Q16.507 344.605 15.8576 344.258Q15.2081 343.911 14.5764 343.532Q13.9448 343.153 13.3324 342.744Q12.7201 342.335 12.1286 341.896Q11.5371 341.458 10.9678 340.991Q10.3986 340.523 9.8529 340.029Q9.30724 339.534 8.7865 339.013Q8.26577 338.493 7.77121 337.947Q7.27665 337.401 6.80946 336.832Q6.34227 336.263 5.90358 335.671Q5.46488 335.08 5.05574 334.468Q4.6466 333.855 4.268 333.224Q3.8894 332.592 3.54224 331.942Q3.19509 331.293 2.88022 330.627Q2.56536 329.961 2.28354 329.281Q2.00172 328.601 1.75362 327.907Q1.50552 327.214 1.29175 326.509Q1.07797 325.804 0.899032 325.09Q0.720093 324.376 0.576422 323.653Q0.432751 322.931 0.324694 322.203Q0.216636 321.474 0.144453 320.741Q0.0722702 320.009 0.0361351 319.273Q0 318.537 0 317.801L0 29.999Q0 29.2626 0.0361351 28.527Q0.0722702 27.7915 0.144453 27.0586Q0.216636 26.3257 0.324694 25.5972Q0.432751 24.8688 0.576422 24.1465Q0.720093 23.4242 0.899032 22.7098Q1.07797 21.9955 1.29175 21.2907Q1.50552 20.586 1.75362 19.8926Q2.00172 19.1993 2.28354 18.5189Q2.56536 17.8385 2.88022 17.1728Q3.19509 16.507 3.54224 15.8576Q3.8894 15.2081 4.268 14.5764Q4.6466 13.9448 5.05574 13.3324Q5.46488 12.7201 5.90358 12.1286Q6.34227 11.5371 6.80946 10.9678Q7.27665 10.3986 7.77121 9.8529Q8.26577 9.30724 8.7865 8.7865Q9.30724 8.26577 9.8529 7.77121Q10.3986 7.27665 10.9678 6.80946Q11.5371 6.34227 12.1286 5.90358Q12.7201 5.46488 13.3324 5.05574Q13.9448 4.6466 14.5764 4.268Q15.2081 3.8894 15.8576 3.54224Q16.507 3.19509 17.1728 2.88022Q17.8385 2.56536 18.5189 2.28354Q19.1993 2.00172 19.8926 1.75362Q20.586 1.50552 21.2908 1.29175Q21.9955 1.07797 22.7098 0.899032Q23.4242 0.720093 24.1465 0.576422Q24.8688 0.432751 25.5972 0.324694Q26.3257 0.216636 27.0586 0.144453Q27.7915 0.0722702 28.527 0.0361351Q29.2626 0 29.999 0Z" transform="translate(272.80005 250.29999)" id="Rectangle-3" fill="#cdcdcd" fill-rule="evenodd" stroke="none"/>
              <path d="M218.524 3.86271e-14C214.602 56.9238 167.182 101.883 109.262 101.883C51.3421 101.883 3.92288 56.9238 -4.51685e-05 1.08358e-13L218.524 0L218.524 3.86271e-14Z" transform="translate(403.5404 281.09003)" id="Ellipse-Intersect-2" fill="#bbbbbb" fill-rule="evenodd" stroke="none"/>
              <path d="M29.999 0L450.201 0Q450.937 0 451.673 0.0361351Q452.408 0.0722702 453.141 0.144453Q453.874 0.216636 454.603 0.324694Q455.331 0.432751 456.053 0.576422Q456.776 0.720093 457.49 0.899032Q458.204 1.07797 458.909 1.29175Q459.614 1.50552 460.307 1.75362Q461.001 2.00172 461.681 2.28354Q462.361 2.56536 463.027 2.88022Q463.693 3.19509 464.342 3.54224Q464.992 3.8894 465.623 4.268Q466.255 4.6466 466.867 5.05574Q467.48 5.46488 468.071 5.90358Q468.663 6.34227 469.232 6.80946Q469.801 7.27665 470.347 7.77121Q470.893 8.26577 471.413 8.7865Q471.934 9.30724 472.429 9.8529Q472.923 10.3986 473.39 10.9678Q473.858 11.5371 474.296 12.1286Q474.735 12.7201 475.144 13.3324Q475.553 13.9448 475.932 14.5764Q476.31 15.2081 476.658 15.8576Q477.005 16.507 477.32 17.1728Q477.635 17.8385 477.916 18.5189Q478.198 19.1993 478.446 19.8926Q478.694 20.586 478.908 21.2908Q479.122 21.9955 479.301 22.7098Q479.48 23.4242 479.623 24.1465Q479.767 24.8688 479.875 25.5972Q479.983 26.3257 480.055 27.0586Q480.128 27.7915 480.164 28.527Q480.2 29.2626 480.2 29.999L480.2 388.001Q480.2 388.737 480.164 389.473Q480.128 390.208 480.055 390.941Q479.983 391.674 479.875 392.403Q479.767 393.131 479.623 393.853Q479.48 394.576 479.301 395.29Q479.122 396.004 478.908 396.709Q478.694 397.414 478.446 398.107Q478.198 398.801 477.916 399.481Q477.635 400.161 477.32 400.827Q477.005 401.493 476.658 402.142Q476.31 402.792 475.932 403.423Q475.553 404.055 475.144 404.668Q474.735 405.28 474.296 405.871Q473.858 406.463 473.39 407.032Q472.923 407.601 472.429 408.147Q471.934 408.693 471.413 409.213Q470.893 409.734 470.347 410.229Q469.801 410.723 469.232 411.191Q468.663 411.658 468.071 412.096Q467.48 412.535 466.867 412.944Q466.255 413.353 465.623 413.732Q464.992 414.111 464.342 414.458Q463.693 414.805 463.027 415.12Q462.361 415.435 461.681 415.716Q461.001 415.998 460.307 416.246Q459.614 416.494 458.909 416.708Q458.204 416.922 457.49 417.101Q456.776 417.28 456.053 417.424Q455.331 417.567 454.603 417.675Q453.874 417.783 453.141 417.856Q452.408 417.928 451.673 417.964Q450.937 418 450.201 418L29.999 418Q29.2626 418 28.527 417.964Q27.7915 417.928 27.0586 417.856Q26.3257 417.783 25.5972 417.675Q24.8688 417.567 24.1465 417.424Q23.4242 417.28 22.7098 417.101Q21.9955 416.922 21.2907 416.708Q20.586 416.494 19.8926 416.246Q19.1993 415.998 18.5189 415.716Q17.8385 415.435 17.1728 415.12Q16.507 414.805 15.8576 414.458Q15.2081 414.111 14.5764 413.732Q13.9448 413.353 13.3324 412.944Q12.7201 412.535 12.1286 412.096Q11.5371 411.658 10.9678 411.191Q10.3986 410.723 9.8529 410.229Q9.30724 409.734 8.7865 409.213Q8.26577 408.693 7.77121 408.147Q7.27665 407.601 6.80946 407.032Q6.34227 406.463 5.90358 405.871Q5.46488 405.28 5.05574 404.667Q4.6466 404.055 4.268 403.423Q3.8894 402.792 3.54224 402.142Q3.19509 401.493 2.88022 400.827Q2.56536 400.161 2.28354 399.481Q2.00172 398.801 1.75362 398.107Q1.50552 397.414 1.29175 396.709Q1.07797 396.004 0.899032 395.29Q0.720093 394.576 0.576422 393.853Q0.432751 393.131 0.324694 392.403Q0.216636 391.674 0.144453 390.941Q0.0722702 390.208 0.0361351 389.473Q0 388.737 0 388.001L0 29.999Q0 29.2626 0.0361351 28.527Q0.0722702 27.7915 0.144453 27.0586Q0.216636 26.3257 0.324694 25.5972Q0.432751 24.8688 0.576422 24.1465Q0.720093 23.4242 0.899032 22.7098Q1.07797 21.9955 1.29175 21.2907Q1.50552 20.586 1.75362 19.8926Q2.00172 19.1993 2.28354 18.5189Q2.56536 17.8385 2.88022 17.1728Q3.19509 16.507 3.54224 15.8576Q3.8894 15.2081 4.268 14.5764Q4.6466 13.9448 5.05574 13.3324Q5.46488 12.7201 5.90358 12.1286Q6.34227 11.5371 6.80946 10.9678Q7.27665 10.3986 7.77121 9.8529Q8.26577 9.30724 8.7865 8.7865Q9.30724 8.26577 9.8529 7.77121Q10.3986 7.27665 10.9678 6.80946Q11.5371 6.34227 12.1286 5.90358Q12.7201 5.46488 13.3324 5.05574Q13.9448 4.6466 14.5764 4.268Q15.2081 3.8894 15.8576 3.54224Q16.507 3.19509 17.1728 2.88022Q17.8385 2.56536 18.5189 2.28354Q19.1993 2.00172 19.8926 1.75362Q20.586 1.50552 21.2908 1.29175Q21.9955 1.07797 22.7098 0.899032Q23.4242 0.720093 24.1465 0.576422Q24.8688 0.432751 25.5972 0.324694Q26.3257 0.216636 27.0586 0.144453Q27.7915 0.0722702 28.527 0.0361351Q29.2626 0 29.999 0Z" transform="translate(272.80005 357.2)" id="Rectangle-2" fill="#FFFFFF" fill-rule="evenodd" stroke="none"/>
              <path d="M218.524 3.86271e-14C214.602 56.9238 167.182 101.883 109.262 101.883C51.3421 101.883 3.92288 56.9238 -4.51685e-05 1.08358e-13L218.524 0L218.524 3.86271e-14Z" transform="translate(401.54053 387.39005)" id="Ellipse-Intersect" fill="#cdcdcd" fill-rule="evenodd" stroke="none"/>
              <path d="M124.026 12.7171L150.727 66.8195Q150.915 67.1997 151.147 67.5544Q151.379 67.9092 151.653 68.2333Q151.926 68.5575 152.236 68.8463Q152.547 69.1351 152.89 69.3843Q153.233 69.6335 153.603 69.8395Q153.974 70.0455 154.367 70.2052Q154.759 70.3649 155.168 70.4761Q155.578 70.5873 155.997 70.6482L215.703 79.3239Q215.944 79.3589 216.181 79.4105Q216.419 79.4622 216.653 79.5302Q216.887 79.5982 217.115 79.6824Q217.343 79.7665 217.565 79.8662Q217.787 79.966 218.002 80.081Q218.216 80.1959 218.423 80.3255Q218.629 80.4551 218.825 80.5986Q219.022 80.7422 219.208 80.8991Q219.394 81.056 219.568 81.2254Q219.743 81.3948 219.906 81.576Q220.068 81.7572 220.218 81.9492Q220.367 82.1412 220.503 82.3431Q220.639 82.545 220.761 82.7559Q220.882 82.9668 220.989 83.1856Q221.095 83.4044 221.186 83.6301Q221.278 83.8558 221.353 84.0873Q221.428 84.3188 221.487 84.5549Q221.546 84.7911 221.588 85.0307Q221.631 85.2704 221.656 85.5124Q221.682 85.7545 221.691 85.9977Q221.7 86.2409 221.691 86.4842Q221.683 86.7274 221.658 86.9695Q221.633 87.2116 221.591 87.4514Q221.55 87.6912 221.491 87.9275Q221.433 88.1637 221.358 88.3954Q221.284 88.6271 221.193 88.853Q221.103 89.079 220.997 89.2981Q220.891 89.5171 220.77 89.7283Q220.649 89.9396 220.514 90.1418Q220.378 90.3441 220.229 90.5366Q220.08 90.729 219.918 90.9105Q219.756 91.0921 219.582 91.262L176.378 133.375Q176.075 133.671 175.809 134.001Q175.543 134.332 175.32 134.692Q175.096 135.052 174.917 135.436Q174.738 135.821 174.607 136.224Q174.476 136.627 174.395 137.043Q174.314 137.459 174.283 137.882Q174.252 138.305 174.273 138.729Q174.294 139.152 174.366 139.57L184.565 199.034Q184.606 199.274 184.63 199.516Q184.654 199.758 184.662 200.002Q184.669 200.245 184.66 200.488Q184.651 200.731 184.624 200.973Q184.598 201.215 184.555 201.455Q184.512 201.694 184.452 201.93Q184.393 202.166 184.317 202.398Q184.241 202.629 184.15 202.854Q184.058 203.08 183.951 203.298Q183.844 203.517 183.721 203.727Q183.599 203.938 183.463 204.14Q183.327 204.341 183.177 204.533Q183.026 204.724 182.863 204.905Q182.7 205.086 182.525 205.255Q182.35 205.424 182.164 205.58Q181.977 205.737 181.78 205.88Q181.583 206.023 181.377 206.152Q181.171 206.281 180.956 206.395Q180.741 206.51 180.519 206.609Q180.296 206.708 180.068 206.791Q179.839 206.875 179.605 206.942Q179.371 207.01 179.133 207.061Q178.895 207.112 178.655 207.146Q178.414 207.181 178.171 207.198Q177.928 207.216 177.685 207.216Q177.441 207.217 177.198 207.201Q176.956 207.184 176.714 207.151Q176.473 207.118 176.235 207.068Q175.997 207.019 175.763 206.952Q175.528 206.886 175.299 206.804Q175.07 206.722 174.848 206.624Q174.625 206.526 174.409 206.412L121.007 178.337Q120.632 178.14 120.235 177.989Q119.839 177.839 119.427 177.737Q119.016 177.636 118.595 177.585Q118.174 177.533 117.75 177.533Q117.326 177.533 116.905 177.585Q116.484 177.636 116.073 177.737Q115.661 177.839 115.265 177.989Q114.869 178.14 114.493 178.337L61.0911 206.413Q60.8757 206.526 60.6529 206.624Q60.4301 206.722 60.2011 206.804Q59.972 206.887 59.7378 206.953Q59.5036 207.019 59.2653 207.069Q59.0271 207.119 58.786 207.152Q58.5448 207.185 58.302 207.201Q58.0592 207.217 57.8158 207.217Q57.5724 207.216 57.3296 207.198Q57.0869 207.181 56.8459 207.147Q56.605 207.112 56.367 207.061Q56.129 207.01 55.8952 206.943Q55.6613 206.875 55.4327 206.792Q55.2041 206.708 54.9818 206.609Q54.7596 206.51 54.5447 206.396Q54.3299 206.281 54.1235 206.152Q53.9172 206.023 53.7203 205.88Q53.5233 205.737 53.3369 205.581Q53.1504 205.424 52.9752 205.255Q52.8 205.086 52.637 204.905Q52.474 204.725 52.3239 204.533Q52.1738 204.342 52.0374 204.14Q51.9011 203.938 51.779 203.728Q51.6569 203.517 51.5498 203.299Q51.4426 203.08 51.3509 202.855Q51.2592 202.629 51.1834 202.398Q51.1076 202.167 51.048 201.931Q50.9885 201.695 50.9454 201.455Q50.9024 201.216 50.8761 200.974Q50.8498 200.732 50.8404 200.489Q50.831 200.245 50.8385 200.002Q50.846 199.759 50.8703 199.517Q50.8947 199.274 50.9359 199.035L61.1346 139.57Q61.2063 139.152 61.227 138.729Q61.2477 138.305 61.2171 137.883Q61.1866 137.46 61.1052 137.044Q61.0238 136.628 60.8928 136.224Q60.7617 135.821 60.583 135.437Q60.4043 135.052 60.1804 134.692Q59.9566 134.332 59.691 134.002Q59.4253 133.671 59.1217 133.375L15.9182 91.2625Q15.7439 91.0927 15.5818 90.9111Q15.4198 90.7295 15.2707 90.5371Q15.1217 90.3447 14.9863 90.1424Q14.851 89.9401 14.73 89.7289Q14.6091 89.5177 14.5031 89.2986Q14.3971 89.0795 14.3066 88.8536Q14.2161 88.6276 14.1415 88.396Q14.0669 88.1643 14.0085 87.928Q13.9502 87.6917 13.9084 87.4519Q13.8666 87.2121 13.8416 86.9701Q13.8166 86.728 13.8085 86.4847Q13.8003 86.2414 13.8091 85.9982Q13.8179 85.755 13.8435 85.513Q13.8692 85.2709 13.9116 85.0313Q13.954 84.7916 14.0129 84.5555Q14.0719 84.3193 14.1471 84.0878Q14.2223 83.8564 14.3134 83.6307Q14.4045 83.405 14.5111 83.1862Q14.6177 82.9673 14.7392 82.7565Q14.8607 82.5456 14.9965 82.3436Q15.1324 82.1417 15.282 81.9497Q15.4315 81.7577 15.5941 81.5765Q15.7566 81.3954 15.9313 81.2259Q16.1061 81.0565 16.2921 80.8996Q16.4782 80.7427 16.6748 80.5992Q16.8713 80.4556 17.0773 80.326Q17.2833 80.1964 17.4979 80.0815Q17.7124 79.9665 17.9344 79.8668Q18.1564 79.767 18.3848 79.6829Q18.6132 79.5988 18.8468 79.5307Q19.0805 79.4627 19.3184 79.411Q19.5562 79.3594 19.7971 79.3244L79.5026 70.6484Q79.9221 70.5874 80.3313 70.4763Q80.7404 70.3651 81.1332 70.2054Q81.5259 70.0456 81.8965 69.8397Q82.267 69.6337 82.61 69.3845Q82.953 69.1353 83.2634 68.8465Q83.5738 68.5577 83.8471 68.2336Q84.1204 67.9094 84.3526 67.5546Q84.5847 67.1999 84.7724 66.8197L111.474 12.717Q111.581 12.4988 111.704 12.2885Q111.827 12.0783 111.964 11.8771Q112.101 11.6759 112.251 11.4846Q112.402 11.2934 112.565 11.1131Q112.729 10.9328 112.904 10.7643Q113.08 10.5958 113.267 10.4399Q113.454 10.284 113.651 10.1415Q113.848 9.99893 114.055 9.87043Q114.262 9.74194 114.477 9.62812Q114.692 9.51429 114.914 9.41569Q115.137 9.31709 115.366 9.23418Q115.595 9.15127 115.829 9.08445Q116.063 9.01764 116.301 8.96725Q116.539 8.91685 116.78 8.88312Q117.021 8.84939 117.264 8.83248Q117.507 8.81558 117.75 8.81558Q117.993 8.81558 118.236 8.83248Q118.479 8.84939 118.72 8.88312Q118.961 8.91686 119.199 8.96725Q119.437 9.01765 119.671 9.08446Q119.905 9.15127 120.134 9.23418Q120.363 9.31709 120.586 9.4157Q120.808 9.5143 121.023 9.62813Q121.238 9.74195 121.445 9.87044Q121.652 9.99893 121.849 10.1415Q122.046 10.284 122.233 10.4399Q122.42 10.5958 122.596 10.7643Q122.771 10.9328 122.935 11.1131Q123.098 11.2934 123.249 11.4847Q123.399 11.6759 123.536 11.8771Q123.673 12.0783 123.796 12.2886Q123.919 12.4988 124.026 12.7171Z" transform="translate(394.5 519)" id="Star" fill="#bbbbbb" fill-rule="evenodd" stroke="none"/>
            </g>
          </svg>
          <span class="font-medium text-3xl">StarShop</span>
        </div>
        <div class="text-base leading-7 font-semibold">
            <?php foreach($data['productos'] as $producto){ ?>
            <div class="flex gap-4 justify-end">
                <div class=""><?= $producto -> codigo ?></div>
                <div class=""><?= $producto -> nombre ?></div>
                <div class=""><?= $producto -> precio ?></div>
            </div>
            <?php } ?>
        <div class="text-base leading-7 font-semibold">
          <div class="flex gap-4 justify-end">
            <div class="">TOTAL:</div>
            <div class="">$<?= $data['ticket'] -> total ?></div>
          </div>
          <div class="flex gap-4 justify-end">
            <div class="">IVA:</div>
            <div class="">$<?= $data['ticket'] -> iva ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>