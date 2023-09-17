
<x-dash-layouts.header />
<body @class([
    'vh-100'=>isset($is405Page)&&$is405Page
]) data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="black" data-headerbg="color_1">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('dash.home') }}" class="brand-logo">
                <svg xmlns="http://www.w3.org/2000/svg" class="logo-abbr" width="30" height="32" viewBox="0 0 117 141" fill="none">
                    <path d="M102.31 43.0045C102.31 43.0045 102.26 42.9645 102.24 42.9345L86.2 26.8944C85.64 26.3344 84.72 26.3245 84.15 26.8845L40.56 69.2845C39.98 69.8545 39.97 70.7845 40.55 71.3645L57.25 87.9345C57.82 88.5045 58.74 88.4945 59.31 87.9345L81.99 65.1145C82.55 64.5545 83.45 64.5444 84.03 65.0844L87.85 68.7245C87.92 68.7845 87.99 68.8444 88.06 68.8944C88.57 69.2244 90.93 71.1145 87.08 75.5545C87.05 75.5845 87.02 75.6144 86.99 75.6444L59.32 102.854C58.75 103.424 57.82 103.414 57.26 102.834L33.39 78.4644C33.39 78.4644 25.26 71.0345 35.13 61.5045L63.47 32.9245L66.21 30.1845C66.53 29.8645 66.67 29.4245 66.62 28.9845C66.38 26.9445 66.25 21.1544 72.9 22.7144C73.41 22.8344 73.94 22.6745 74.29 22.2945L76.67 19.7744C77.21 19.2044 77.2 18.2945 76.64 17.7445L59.24 0.424472C58.7 -0.115528 57.82 -0.145526 57.25 0.364474L54.65 2.65445C54.3 2.96445 54.11 3.42444 54.16 3.89444C54.39 6.01444 54.45 11.9845 47.41 10.2345C46.91 10.1145 46.38 10.2645 46.02 10.6345L5.39004 52.1745C5.32004 52.2445 5.26004 52.3245 5.20004 52.4145C4.10004 54.1545 -7.01996 72.7045 7.09004 90.4345C7.13004 90.4845 7.17004 90.5245 7.21004 90.5645L57.08 140.124C57.65 140.694 58.57 140.684 59.14 140.124L110.25 89.0145C110.25 89.0145 110.34 88.9145 110.38 88.8645C111.53 87.3345 127.72 64.8845 102.28 42.9845L102.31 43.0045ZM64 19.4445C64.33 19.0945 64.89 19.0745 65.24 19.4145L67.11 21.1845C67.46 21.5145 67.48 22.0745 67.14 22.4245C66.81 22.7745 66.25 22.7944 65.9 22.4544L64.03 20.6845C63.68 20.3545 63.66 19.7945 64 19.4445ZM59.03 14.8745C59.36 14.5245 59.92 14.5045 60.27 14.8445L62.14 16.6145C62.49 16.9445 62.51 17.5045 62.17 17.8545C61.84 18.2045 61.28 18.2245 60.93 17.8845L59.06 16.1145C58.71 15.7845 58.69 15.2245 59.03 14.8745ZM54.06 10.0345C54.39 9.68446 54.95 9.66449 55.3 10.0045L57.17 11.7744C57.52 12.1044 57.54 12.6645 57.2 13.0145C56.87 13.3645 56.31 13.3845 55.96 13.0445L54.09 11.2744C53.74 10.9444 53.72 10.3845 54.06 10.0345Z" fill="#CB942C"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="brand-title" width="100" height="32" viewBox="0 0 526 118" fill="none">
                    <path d="M52.5202 38.0347H33.8402V28.9948H66.4302C68.3902 50.2347 54.8302 65.5947 34.3502 65.5947C13.8702 65.5947 0.740234 51.9447 0.740234 33.0947C0.740234 14.2447 14.8202 0.594727 34.3502 0.594727C49.0202 0.594727 61.1402 9.55473 63.7802 22.0947L50.4702 24.3947C48.5902 17.7447 41.8502 12.8748 34.2602 12.8748C23.0902 12.8748 15.0702 21.3247 15.0702 33.0947C15.0702 44.8647 23.2602 53.3148 34.6902 53.3148C44.5002 53.3148 52.3502 46.6647 52.5202 38.0447V38.0347Z" fill="white"/>
                    <path d="M122.73 41.6247C122.73 55.5347 112.83 65.1747 98.4204 65.1747C84.0104 65.1747 74.1904 55.5347 74.1904 41.6247C74.1904 27.7147 84.0904 18.0747 98.4204 18.0747C112.75 18.0747 122.73 27.6247 122.73 41.6247ZM109.85 41.6247C109.85 34.4547 105.16 29.3447 98.4204 29.3447C91.6804 29.3447 87.0704 34.4647 87.0704 41.6247C87.0704 48.7847 91.7604 53.9047 98.4204 53.9047C105.08 53.9047 109.85 48.7847 109.85 41.6247Z" fill="white"/>
                    <path d="M144.49 0.164551V63.4645H131.69V0.164551H144.49Z" fill="white"/>
                    <path d="M174.26 18.0746C180.23 18.0746 185.26 20.6346 188.68 25.0746V0.164551H201.48V63.4645H188.85V58.1746C185.44 62.5246 180.4 65.1746 174.26 65.1746C162.15 65.1746 153.53 55.4446 153.53 41.6246C153.53 27.8046 162.15 18.0746 174.26 18.0746ZM166.33 41.6246C166.33 48.6246 171.19 53.6545 177.76 53.6545C184.33 53.6545 189.19 48.5346 189.19 41.6246C189.19 34.7146 184.41 29.5945 177.76 29.5945C171.11 29.5945 166.33 34.7146 166.33 41.6246Z" fill="white"/>
                    <path d="M234.66 18.0745C248.65 18.0745 258.21 27.6245 258.21 41.4445C258.21 42.5545 258.21 44.3444 258.04 45.2844L223.83 45.1945C224.94 51.3345 229.12 55.3444 234.92 55.3444C239.7 55.3444 243.71 52.6144 245.07 48.7744L256.59 50.3944C254.46 58.9244 245.24 65.1544 234.58 65.1544C220.5 65.1544 210.61 55.3445 210.61 41.2645C210.61 27.1845 220.59 18.0645 234.67 18.0645L234.66 18.0745ZM245.24 37.5244C244.47 31.9744 240.21 27.8845 234.41 27.8845C228.61 27.8845 224.86 31.7244 223.75 37.5244H245.25H245.24Z" fill="white"/>
                    <path d="M279.8 19.7845V25.6745C282.87 20.9845 287.99 18.0845 293.7 18.0845C303.51 18.0845 310.16 25.6745 310.16 36.1745V63.4745H297.36V38.3945C297.36 33.1045 294.29 29.3545 289.26 29.3545C284.23 29.3545 280.13 33.3645 280.13 38.9045V63.4745H267.33V19.7945H279.78L279.8 19.7845Z" fill="white"/>
                    <path d="M370.57 42.4745L380.29 44.0945C377.56 56.5545 365.36 65.5945 351.29 65.5945C332.95 65.5945 319.64 52.0346 319.73 33.2646C319.73 14.4946 332.95 0.93457 351.29 0.93457C365.37 0.93457 377.56 10.4046 380.29 23.3746L370.48 24.5646C368.43 16.0346 360.41 9.89453 351.37 9.89453C338.83 9.89453 329.96 19.6246 329.96 33.2646C330.05 46.9146 338.92 56.7245 351.37 56.7245C360.24 56.7245 368.26 50.7545 370.56 42.4745H370.57Z" fill="#CA952D"/>
                    <path d="M427.13 20.1246H436.43V63.4645H427.13V56.9846C423.46 62.1046 417.75 65.1746 411.01 65.1746C398.3 65.1746 389.26 55.3646 389.26 41.8046C389.26 28.2446 398.3 18.4346 411.01 18.4346C417.75 18.4346 423.47 21.5046 427.13 26.6246V20.1445V20.1246ZM427.05 41.7946C427.05 33.0046 421.08 26.6946 412.8 26.6946C404.52 26.6946 398.47 33.0046 398.47 41.7946C398.47 50.5846 404.53 56.8945 412.8 56.8945C421.07 56.8945 427.05 50.5846 427.05 41.7946Z" fill="#CA952D"/>
                    <path d="M457.67 20.1248V25.6747C460.31 21.2347 464.5 18.5947 469.44 18.5947C471.15 18.5947 473.11 19.0247 474.99 19.7047V27.9847C472.6 26.9647 469.96 26.6248 468.25 26.6248C462.11 26.6248 458.01 32.0848 458.01 39.7648V63.4847H448.71V20.1447H457.67V20.1248Z" fill="#CA952D"/>
                    <path d="M500.67 18.4146C507.15 18.4146 512.7 21.2346 516.37 26.0046V0.494629H525.67V63.4546H516.63V57.3946C512.88 62.2546 507.33 65.1546 500.68 65.1546C488.14 65.1546 478.93 55.3446 478.93 41.7846C478.93 28.2246 488.06 18.4146 500.68 18.4146H500.67ZM488.13 41.7846C488.13 50.4046 494.27 56.4546 502.46 56.4546C510.65 56.4546 516.71 50.2246 516.71 41.7846C516.71 33.3446 510.74 27.1146 502.46 27.1146C494.18 27.1146 488.13 33.3446 488.13 41.7846Z" fill="#CA952D"/>
                    <path d="M232.81 107.465L239.45 84.9048H241.51L234.36 109.075H231.26L225.17 87.1348L219.12 109.075H215.96L208.81 84.9048H210.91L217.55 107.465L223.77 84.9048H226.66L232.82 107.465H232.81Z" fill="white"/>
                    <path d="M247.7 83.8748V94.7448C248.8 92.5448 251.24 91.0947 253.96 91.0947C258.33 91.0947 261.08 94.3647 261.08 98.9047V109.085H259.19V98.9047C259.19 95.3947 257.13 92.8848 253.72 92.8848C250.31 92.8848 247.7 95.3947 247.7 98.8647V109.075H245.77V83.8647H247.7V83.8748Z" fill="white"/>
                    <path d="M274.66 91.0947C279.92 91.0947 283.67 94.9847 283.67 100.345V101.065H267.34C267.62 105.125 270.61 108.015 274.63 108.015C277.59 108.015 280.41 106.155 281.3 103.615L283.16 103.925C282.06 107.295 278.52 109.775 274.7 109.775C269.3 109.775 265.42 105.815 265.42 100.355C265.42 94.8947 269.31 91.1047 274.67 91.1047L274.66 91.0947ZM281.71 99.3447C281.33 95.5247 278.44 92.8848 274.59 92.8848C270.74 92.8848 267.75 95.5347 267.37 99.3447H281.71Z" fill="white"/>
                    <path d="M290.17 91.7847V94.5048C291.1 92.4048 292.78 91.1348 295.02 91.1348C295.85 91.1348 296.74 91.3448 297.53 91.6848V93.5048C296.64 93.0948 295.71 92.8848 294.92 92.8848C292.07 92.8848 290.24 95.4648 290.24 99.2448V109.085H288.32V91.7847H290.18H290.17Z" fill="white"/>
                    <path d="M308.4 91.0947C313.66 91.0947 317.41 94.9847 317.41 100.345V101.065H301.08C301.35 105.125 304.35 108.015 308.37 108.015C311.33 108.015 314.15 106.155 315.04 103.615L316.9 103.925C315.8 107.295 312.26 109.775 308.44 109.775C303.04 109.775 299.16 105.815 299.16 100.355C299.16 94.8947 303.05 91.1047 308.41 91.1047L308.4 91.0947ZM315.45 99.3447C315.07 95.5247 312.18 92.8848 308.33 92.8848C304.48 92.8848 301.49 95.5347 301.11 99.3447H315.45Z" fill="white"/>
                    <path d="M338.94 109.765C334.61 109.765 331.51 107.115 331.51 103.475H333.37C333.37 106.125 335.71 108.015 338.94 108.015C341.9 108.015 344.03 106.465 344.03 104.405C344.03 101.965 340.97 101.415 338.6 101.105C335.06 100.585 331.96 99.9348 331.96 96.3248C331.96 93.2948 334.75 91.0947 338.42 91.0947C342.48 91.0947 345.5 93.5347 345.5 96.9047L343.61 96.8748C343.61 94.5348 341.41 92.8848 338.42 92.8848C335.84 92.8848 333.81 94.3247 333.81 96.3547C333.81 98.3847 335.63 98.8648 338.8 99.3148C341.96 99.7948 345.88 100.555 345.88 104.265C345.88 107.465 342.96 109.765 338.93 109.765H338.94Z" fill="white"/>
                    <path d="M365.79 91.7845H367.68V109.084H365.79V105.375C364.45 108.055 361.73 109.774 358.4 109.774C353.21 109.774 349.46 105.854 349.46 100.454C349.46 95.0545 353.21 91.1045 358.4 91.1045C361.74 91.1045 364.45 92.8245 365.79 95.5445V91.7945V91.7845ZM365.79 100.454C365.79 96.0845 362.66 92.8845 358.57 92.8845C354.48 92.8845 351.35 96.0445 351.35 100.454C351.35 104.864 354.38 108.024 358.57 108.024C362.76 108.024 365.79 104.824 365.79 100.454Z" fill="white"/>
                    <path d="M378.93 109.075L371.85 91.7749H373.91L380.24 107.495L386.57 91.7749H388.63L381.55 109.075H378.94H378.93Z" fill="white"/>
                    <path d="M392.58 86.8646C392.58 86.0346 393.17 85.4546 394.02 85.4546C394.87 85.4546 395.47 86.0446 395.47 86.8646C395.47 87.6846 394.85 88.3046 394.02 88.3046C393.19 88.3046 392.58 87.7246 392.58 86.8646ZM394.95 91.7846V109.085H393.06V91.7846H394.95Z" fill="white"/>
                    <path d="M402.97 91.7847V94.6747C404.11 92.5047 406.65 91.0947 409.37 91.0947C413.77 91.0947 416.35 94.3647 416.35 98.9047V109.085H414.46V98.9047C414.46 95.3947 412.64 92.8848 409.23 92.8848C405.82 92.8848 402.97 95.3947 402.97 98.8647V109.075H401.05V91.7747H402.97V91.7847Z" fill="white"/>
                    <path d="M436.95 108.945V105.435C435.5 108.045 432.89 109.665 429.66 109.665C424.43 109.665 420.68 105.775 420.68 100.445C420.68 95.115 424.43 91.125 429.66 91.125C432.93 91.125 435.54 92.775 436.99 95.355V91.775H438.88V108.935C438.88 114.235 435.2 117.675 430.11 117.675C425.54 117.675 421.79 114.825 421.2 110.905L423.06 110.665C423.54 113.725 426.5 115.925 430.04 115.925C434.06 115.925 436.95 113.175 436.95 108.945ZM437.02 100.455C437.02 96.055 433.96 92.885 429.8 92.885C425.64 92.885 422.58 96.045 422.58 100.455C422.58 104.865 425.67 107.915 429.8 107.915C433.93 107.915 437.02 104.755 437.02 100.455Z" fill="white"/>
                    <path d="M451.08 109.765C446.75 109.765 443.65 107.115 443.65 103.475H445.51C445.51 106.125 447.85 108.015 451.08 108.015C454.04 108.015 456.17 106.465 456.17 104.405C456.17 101.965 453.11 101.415 450.74 101.105C447.2 100.585 444.1 99.9348 444.1 96.3248C444.1 93.2948 446.89 91.0947 450.56 91.0947C454.62 91.0947 457.64 93.5347 457.64 96.9047L455.75 96.8748C455.75 94.5348 453.55 92.8848 450.56 92.8848C447.98 92.8848 445.95 94.3247 445.95 96.3547C445.95 98.3847 447.77 98.8648 450.94 99.3148C454.1 99.7948 458.02 100.555 458.02 104.265C458.02 107.465 455.1 109.765 451.07 109.765H451.08Z" fill="white"/>
                    <path d="M488.39 91.7845H490.28V109.084H488.39V105.375C487.05 108.055 484.33 109.774 481 109.774C475.81 109.774 472.06 105.854 472.06 100.454C472.06 95.0545 475.81 91.1045 481 91.1045C484.34 91.1045 487.05 92.8245 488.39 95.5445V91.7945V91.7845ZM488.39 100.454C488.39 96.0845 485.26 92.8845 481.17 92.8845C477.08 92.8845 473.95 96.0445 473.95 100.454C473.95 104.864 476.98 108.024 481.17 108.024C485.36 108.024 488.39 104.824 488.39 100.454Z" fill="white"/>
                    <path d="M497.95 91.7847V94.5048C498.88 92.4048 500.56 91.1348 502.8 91.1348C503.63 91.1348 504.52 91.3448 505.31 91.6848V93.5048C504.42 93.0948 503.49 92.8848 502.7 92.8848C499.85 92.8848 498.02 95.4648 498.02 99.2448V109.085H496.09V91.7847H497.95Z" fill="white"/>
                    <path d="M516.17 91.0947C521.43 91.0947 525.18 94.9847 525.18 100.345V101.065H508.85C509.12 105.125 512.12 108.015 516.14 108.015C519.1 108.015 521.92 106.155 522.81 103.615L524.67 103.925C523.57 107.295 520.03 109.775 516.21 109.775C510.81 109.775 506.93 105.815 506.93 100.355C506.93 94.8947 510.82 91.1047 516.18 91.1047L516.17 91.0947ZM523.22 99.3447C522.84 95.5247 519.95 92.8848 516.1 92.8848C512.25 92.8848 509.26 95.5347 508.88 99.3447H523.22Z" fill="white"/>
                    </svg>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


		<x-dash-layouts.header-nav />
		<x-dash-layouts.sidebar />


            {{ $slot }}
		<x-dash-layouts.footer />

