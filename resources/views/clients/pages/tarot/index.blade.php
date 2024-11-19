@extends('clients.layouts.main')

@section('title', '')
@section('description', "")

@section('css')
@vite('resources/css/app.scss')
@endsection

@section('content')
<div class="container mx-auto min-h-screen">
    <div class="text-center">
        <h1>BÓI BÀI TAROT ONLINE</h1>
        <p>Khám phá câu trả lời bạn tìm kiếm qua 3 lá bài.</p>
    </div>
    <div class="flex flex-col items-center justify-center gap-4">
        <div class="drop ">
            <div class="option active placeholder" data-value="placeholder">
                Choose wisely
            </div>
            <div class="option" data-value="wow">
                Wow!
            </div>
            <div class="option" data-value="drop">
                So dropdown!
            </div>
            <div class="option" data-value="select">
                Very select!
            </div>
            <div class="option" data-value="custom">
                Much custom!
            </div>
            <div class="option" data-value="animation">
                Such animation!
            </div>
        </div>
        <button class="inline-flex deal items-center justify-center w-fit px-5 py-2 text-base font-medium text-center text-indigo-100 border border-indigo-500 rounded-3xl shadow-sm cursor-pointer hover:text-white bg-gradient-to-br from-purple-500 via-indigo-500 to-indigo-500">
            <span class="relative"> {{ __('common.reset_card') }} <i class="fa-solid fa-arrow-rotate-left"></i></span>
        </button>
    </div>
    <div class="deck my-6 text-center">
            @foreach ($cards as $key => $card)
            <div class="card  card1 mt-5 hover:translate-y-[-0.75rem] z-[900] open-card" data-name="{{ $card['name'] }}" data-status="{{ $card['status'] }}" data-image="{{ asset($card['src']) }}" data-main-meaning="{{ $card['mainMeaning'] }}" data-reverse-meaning="{{ $card['reverseMeaning'] }}" data-description="{{ $card['description'] }}">
                <div class="face front overflow-hidden border-[1.5px] border-gray-300">
                    <img class="object-contain w-full h-full" src="{{ asset('assets/images/cards/cart-tarot-3.jpg')}}" alt="">
                </div>
                <div class="face back  overflow-hidden ">
                    <img class="object-fill w-full h-full {{ $card['status'] === 0 ? 'rotate-180' : '' }}" src="{{ asset($card['src']) }}" alt="">
                </div>
            </div>
            @endforeach
    </div>
    <div id="selected-cards" class="my-6 grid grid-cols-2 sm:grid-cols-3 justify-center"></div>
    <div id="read-cards" class="mb-6 flex justify-center items-center"></div>
    <div id="result-read-cards" class="mb-6 font-body text-lg text-primary transition-colors group-hover:text-green dark:text-white dark:group-hover:text-secondary"></div>

    <div id="loading" class=" flex justify-center mb-6" style="display: none;">
        <div class="loader">
            <svg viewBox="0 0 80 80">
                <circle r="32" cy="40" cx="40" id="test"></circle>
            </svg>
        </div>

        <div class="loader triangle">
            <svg viewBox="0 0 86 80">
                <polygon points="43 8 79 72 7 72"></polygon>
            </svg>
        </div>

        <div class="loader">
            <svg viewBox="0 0 80 80">
                <rect height="64" width="64" y="8" x="8"></rect>
            </svg>
        </div>
    </div>

</div>

@endsection
@section('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/TextPlugin.min.js" crossorigin="anonymous"></script>

<script>
    delay = 500; // delay the effect
    fadetime = 500; // fade in time
    let openCardCount = 0; // count the number of opened cards
    const maxOpenCards = 3;
    let selectedCards = [];

    function deal() {
        $.ajax({
            url: '/get-cards', // URL to the route that returns shuffled cards
            method: 'GET',
            success: function(data) {
                openCardCount = 0;
                clicked = false; // set flag for clicked state
                $('#selected-cards').empty();
                $('#read-cards').empty();

                // Clear the selected cards section

                // Clear current deck
                $('.deck').empty();

                // Add shuffled cards to the deck
                data.forEach(function(card, key) {
                    let rotationClass = card.status === 0 ? 'rotate-180' : ''; 
                    let cardElement = `
                        <div class="card card1 mt-5 hover:translate-y-[-0.75rem] z-[900] open-card" data-name="${card.name}" data-status="${card.status}" data-image="${card.src}" data-main-meaning="${card.mainMeaning}" data-reverse-meaning="${card.reverseMeaning}" data-description="${card.description}">
                            <div class="face front overflow-hidden border-[1.5px] border-gray-300">
                                <img class="object-contain w-full h-full" src="{{ asset('assets/images/cards/cart-tarot-3.jpg') }}" alt="">
                            </div>
                            <div class="face back overflow-hidden">
                                <img class="object-fill w-full h-full ${rotationClass}" src="${card.src}" alt="">
                            </div>
                        </div>
                    `;
                    $('.card').hide();
                    $('.card1').delay(delay).fadeIn(fadetime);
                    $('.deck').append(cardElement);
                });

            },
            error: function() {
                alert('Failed to retrieve cards. Please try again.');
            }
        });
    }

    $('.deck').on('click', '.card', function() {
        if (!$(this).hasClass('flip') && openCardCount >= maxOpenCards) {
            Swal.fire({
                title: "Sweet!",
                text: "Đủ gòi chỉ được bốc 3 lá thoii bạn trẻ .___.",
                imageUrl: "{{ asset('assets/images/stop.jpg') }}",
                imageWidth: 400,
                imageHeight: 200,
                imageAlt: "Custom image",
            });
            return;
        }

        $(this).addClass('flip');
        if ($(this).hasClass('flip') && $(this).hasClass('open-card')) {
            openCardCount++;
            let cardName = $(this).data('name');
            let cardImage = $(this).data('image');
            let cardMainMeaning = $(this).data('main-meaning');
            let cardReverseMeaning = $(this).data('reverse-meaning');
            let cardDescription = $(this).data('description');
            let cardStatus = $(this).data('status');
            let rotationClass = cardStatus === 0 ? 'rotate-180' : ''; 

            let cardDetails = `
                            <div class="selected-card flex justify-center">
                                <div class="card-info h-full">
                                    <figure class="front"><img class="h-full w-full ${rotationClass}" src="${cardImage}" /></figure>
                                    <figure class="back">
                                        <h3 class="text-left text-lg text-gray-100">${cardName}</h3>
                                        
                                        <div class="description text-left">
                                            <p class="mt-2"><strong class="text-gray-100">Main Meaning:</strong> ${cardMainMeaning}</p>
                                            <p class="mt-2"><strong class="text-gray-100">Reverse Meaning:</strong> ${cardReverseMeaning}</p>
                                            <p class="mt-2">${cardDescription}</p>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        `;
            let buttonReadCards = `
            <button class="inline-flex readcards items-center justify-center px-5 py-2 text-base font-medium text-center text-indigo-100 border border-indigo-500 rounded-3xl shadow-sm cursor-pointer hover:text-white bg-gradient-to-br from-purple-500 via-indigo-500 to-indigo-500">
                <span class="relative">Read cards <i class="fa-brands fa-hornbill"></i></span>
            </button>
            `;
            selectedCards.push({ name: cardName, status: cardStatus });
            $('#selected-cards').append(cardDetails);
            $(this).removeClass('open-card');

            //Add button read 3 selected cards
            if (openCardCount == 3) {
                $('#read-cards').append(buttonReadCards);
            }
        }
    });

    $('.deal').click(function() {
        // if (openCardCount > 0) {
            deal();
        // }
    });
    $('#read-cards').on('click', '.readcards', function(event) {
        if (openCardCount == 3) {
            readSelectedCards();
        }
    });

    // Use event delegation to handle clicks on .card-info
    $('#selected-cards').on('click', '.card-info', function(event) {
        $(event.currentTarget).toggleClass('flipped');
    });


    function readSelectedCards() {
        $('#read-cards').empty();

        $.ajax({
            url: "{{ route('tarot.read_cards') }}", // URL to the route that handles selected cards
            method: 'POST',
            data: {
                cards: selectedCards,
                _token: '{{ csrf_token() }}'
            },
            beforeSend: function() {
                $('#loading').show();
            },
            success: function(response) {
                $('#loading').hide();
                var resultReadCards = response;
                resultReadCards = resultReadCards.replace(/```html|```/g, '');
                $('#result-read-cards').append(resultReadCards);
            },
            error: function() {

            }
        });
    }
    $(document).ready(function() {
        $(".drop .option").click(function() {
            var val = $(this).attr("data-value"),
                $drop = $(".drop"),
                prevActive = $(".drop .option.active").attr("data-value"),
                options = $(".drop .option").length;
            $drop.find(".option.active").addClass("mini-hack");
            $drop.toggleClass("visible");
            $drop.removeClass("withBG");
            $(this).css("top");
            $drop.toggleClass("opacity");
            $(".mini-hack").removeClass("mini-hack");
            if ($drop.hasClass("visible")) {
                setTimeout(function() {
                    $drop.addClass("withBG");
                }, 400 + options * 100);
            }
            triggerAnimation();
            if (val !== "placeholder" || prevActive === "placeholder") {
                $(".drop .option").removeClass("active");
                $(this).addClass("active");
            };
        });
        $(document).click(function(event) {
            if (!$(event.target).closest(".drop").length) {
                $(".drop").removeClass("visible");
                $(".drop").removeClass("withBG opacity");
            }
        });

        function triggerAnimation() {
            var finalWidth = $(".drop").hasClass("visible") ? 22 : 20;
            $(".drop").css("width", "24em");
            setTimeout(function() {
                $(".drop").css("width", finalWidth + "em");
            }, 400);
        }
    });
</script>
@endsection