'use script';
import Swiper, {Navigation, Pagination, Autoplay, Thumbs} from 'swiper';
import Readmore from "readmore-js";
import GLightbox from 'glightbox';

Swiper.use([Navigation, Pagination, Autoplay, Thumbs]);


window.addEventListener('DOMContentLoaded', () => {
    /* HAMBURGER MENU IN HEADER*/
    let header = document.querySelector('.header'),
        main = document.querySelector('main'),
        footer = document.querySelector('.footer'),
        html = document.querySelector('html'),
        body = document.querySelector('body'),
        searchForm = header.querySelector('.form-wrapper-header'),
        hamburgerBtn = header.querySelector('.js-burger'),
        hamburgerMenu = header.querySelector('.hamburger-menu');


    header.addEventListener('click', (e) => {
        if (e.target && e.target.classList.contains('js-burger')) {
            hamburgerMenu.classList.toggle('active');
            hamburgerBtn.classList.toggle('active');
        }
        if (e.target && e.target.classList.contains('js-search')) {
            searchForm.classList.toggle('active');
        }
    });
    /* ЗАГРУЗКА ДАННЫХ ИЗ LocalStorage */
    /* пример
    if(localStorage.getItem('city') != null){
        regionBtn.innerHTML = localStorage.getItem('city');
    } else{
        regionBtn.innerHTML = 'Москва';
    }
    */

    /* MODAL */
    let modalBlock = document.querySelector('.js-sidebars'),
        allModal = document.querySelectorAll('.js-sidebars > section'),
        modalCall = document.querySelector('.modal-call'),
        modalQuest = document.querySelector('.modal-quest'),
        modalRegion = document.querySelector('.modal-region'),
        modalOneClick = document.querySelector('.modal-one-click'),
        modalAssortment = document.querySelector('.modal-assortment'),
        modalJob = document.querySelector('.modal-job'),
        modalPersonal = document.querySelector('.modal-personal'),
        modalResetPass = document.querySelector('.modal-reset-pass'),
        modalSubscribe = document.querySelector('.modal-subscribe'),
        modalReviews = document.querySelector('.modal-reviews'),
        regionSelect = document.querySelectorAll('.modal-region__link'),
        regionBtn = document.querySelector('.js-region-city'),
        burgerMenu = document.querySelector('.adaptive-menu');

    if (localStorage.getItem('city') != null) {
        console.log(localStorage.getItem('city'));
        console.log(typeof (localStorage.getItem('city')));
        regionBtn.innerHTML = localStorage.getItem('city');
    } else {
        regionBtn.innerHTML = 'Москва';
    }
    document.addEventListener('click', e => {

        let target = e.target;

        if (target && (target.classList.contains('js-call') || target.classList.contains('modal-call__exit'))) {
            openCloseModal(e, modalCall);
        }
        if (target && (target.classList.contains('js-reviews') || target.classList.contains('modal-reviews__exit'))) {

            openCloseModal(e, modalReviews);
        }
        if (target && (target.classList.contains('js-modal-header') || target.classList.contains('adaptive-menu__exit'))) {
            function MoveDiv() {
                var fragment = document.createDocumentFragment();
                fragment.appendChild(document.getElementById('source'));
                document.getElementById('destination').appendChild(fragment);
            }

            openCloseModal(e, burgerMenu);
        }
        if (target && (target.classList.contains('js-one-click') || target.classList.contains('modal-one-click__exit') || target.classList.contains('js-product-one-click'))) {
            openCloseModal(e, modalOneClick);
        }
        if (target && (target.classList.contains('js-job') || target.classList.contains('modal-job__exit'))) {
            openCloseModal(e, modalJob);
        }
        if (target && (target.classList.contains('js-subscribe') || target.classList.contains('modal-subscribe__exit'))) {
            openCloseModal(e, modalSubscribe);
        }
        if (target && (target.classList.contains('js-assortment') || target.classList.contains('modal-assortment__exit'))) {
            openCloseModal(e, modalAssortment);
        }
        if (target && (target.classList.contains('js-region') || target.classList.contains('modal-region__exit'))) {
            openCloseModal(e, modalRegion);
        }
        if (target && (target.classList.contains('js-quest') || target.classList.contains('modal-quest__exit'))) {
            openCloseModal(e, modalQuest);
        }
        if (target && (target.classList.contains('js-personal-data') || target.classList.contains('modal-personal__exit'))) {
            openCloseModal(e, modalPersonal);
        }
        if (target && (target.classList.contains('js-reset-pass') || target.classList.contains('modal-reset-pass__exit'))) {
            openCloseModal(e, modalResetPass);
        }
        if (target.classList.contains('modal-region__link')) {
            for (let i = 0; i < regionSelect.length; i++) {
                if (regionSelect[i] == target) {
                    let citiValue = regionSelect[i].innerHTML;
                    localStorage.setItem('city', citiValue)
                    let testValue = localStorage.getItem('city')
                    if (testValue == 'undifiend') {
                        regionBtn.innerHTML = 'Москва';
                    } else {
                        regionBtn.innerHTML = testValue.innerHTML;
                        regionBtn.innerHTML = testValue;
                    }

                }
            }
            /*
            regionSelect.forEach(item => {
                if (item == target) {
                    let citiValue = item.innerHTML;
                    localStorage.setItem('city', citiValue)
                    let testValue = localStorage.getItem('city')
                    regionBtn.innerHTML = testValue.innerHTML;
                    regionBtn.innerHTML = testValue;
                }
            });
            */
            openCloseModal(e, modalRegion);
        } else if (target.classList.contains('js-region-close')) {
            let city = document.querySelector('.js-select-city');
            localStorage.setItem('city', city.innerHTML);
            let testValue = localStorage.getItem('city');
            regionBtn.innerHTML = testValue;
            openCloseModal(e, modalRegion);
        }


        /* ЗАКРЫТИЕ ПО КЛИКУ НА САЙДБАР */
        if (target && target.classList.contains('sidebar-bg')) {
            e.preventDefault();
            //html.classList.toggle('lock');
            modalBlock.classList.toggle('sidebar-bg');
            for (let i = 0; i < allModal.length; i++) {
                if (allModal[i].classList.toggle('active')) {
                    allModal[i].classList.remove('active');
                }
            }
            html.classList.toggle('lock');
            body.classList.toggle('lock');
            header.classList.toggle('blur');
            main.classList.toggle('blur');
            footer.classList.toggle('blur');
            /*
            allModal.forEach(item => {
                if (item.classList.toggle('active')) {
                    item.classList.remove('active');
                }
            });*/
        }

    });

    function openCloseModal(e, modal) {
        e.preventDefault();
        html.classList.toggle('lock');
        body.classList.toggle('lock');
        modalBlock.classList.toggle('sidebar-bg');
        modal.classList.toggle('active');
        header.classList.toggle('blur');
        main.classList.toggle('blur');
        footer.classList.toggle('blur');
    }


    /* TABS */
    let popularParent = document.querySelector('.popular-block'),
        popularLink = document.querySelectorAll('.js-popular-link'),
        popularTabs = document.querySelectorAll('.js-popular-tab'),
        reviewsBlockParent = document.querySelector('.review-block'),
        reviewsBlockLink = document.querySelectorAll('.js-review-block-link'),
        reviewsBlockTabs = document.querySelectorAll('.js-review-block-tab'),
        newsBlockParent = document.querySelector('.news-block'),
        newsBlockLink = document.querySelectorAll('.js-news-block-link'),
        newsBlockTabs = document.querySelectorAll('.js-news-block-tab'),
        regionParent = document.querySelector('.region'),
        regionLink = document.querySelectorAll('.js-region-link'),
        regionTabs = document.querySelectorAll('.js-region-tabs'),
        userParent = document.querySelector('.user'),
        userLink = document.querySelectorAll('.js-user-link'),
        userTabs = document.querySelectorAll('.js-user-content');

    if (popularParent && popularLink.length > 0 && popularLink.length == popularTabs.length) {
        toggleTabs(popularLink, popularTabs, popularParent, 'js-popular-link');
    }
    if (reviewsBlockParent && reviewsBlockLink.length > 0 && reviewsBlockLink.length == reviewsBlockTabs.length) {
        toggleTabs(reviewsBlockLink, reviewsBlockTabs, reviewsBlockParent, 'js-review-block-link');
    }
    if (newsBlockParent && newsBlockLink.length > 0 && newsBlockLink.length == newsBlockTabs.length) {
        toggleTabs(newsBlockLink, newsBlockTabs, newsBlockParent, 'js-news-block-link');
    }
    if (regionParent && regionLink.length > 0 && regionLink.length == regionTabs.length) {
        toggleTabs(regionLink, regionTabs, regionParent, 'js-region-link', true);
    }
    if (userParent && userLink.length > 0 && userLink.length == userTabs.length) {
        toggleTabs(userLink, userTabs, userParent, 'js-user-link');
    }

    function toggleTabs(link, tabs, parent, classContains, subRegion, subLink, subContent) {
        hideTabs(link, tabs);
        showTabs(0, link, tabs);

        let subIndex = 0;

        if (subRegion) {
            let subLinks = tabs[0].querySelectorAll('.js-subregion-link'),
                subTabs = tabs[0].querySelectorAll('.subregion__content');

            if (subLinks.length > 0 && subLinks.length == subTabs.length) {
                hideTabs(subLinks, subTabs);
                showTabs(0, subLinks, subTabs);
            }

        }
        parent.addEventListener('click', (e) => {
            if (e.target && e.target.classList.contains(classContains)) {
                e.preventDefault();

                for (let i = 0; i < link.length; i++) {
                    if (link[i] === e.target) {
                        hideTabs(link, tabs);
                        showTabs(i, link, tabs);
                        if (subRegion) {
                            let subLinks = tabs[i].querySelectorAll('.js-subregion-link'),
                                subTabs = tabs[i].querySelectorAll('.subregion__content');
                            if (subLinks.length > 0 && subLinks.length == subTabs.length) {
                                hideTabs(subLinks, subTabs);
                                showTabs(0, subLinks, subTabs);
                                subIndex = i;
                            }

                        }

                    }
                }
            }
            let subLinks = tabs[subIndex].querySelectorAll('.js-subregion-link'),
                subTabs = tabs[subIndex].querySelectorAll('.subregion__content');
            if (e.target && e.target.classList.contains('js-subregion-link')) {
                e.preventDefault();
                for (let i = 0; i < subLinks.length; i++) {
                    if (subLinks[i] === e.target) {
                        hideTabs(subLinks, subTabs);
                        showTabs(i, subLinks, subTabs);
                    }
                }
            }
        });
    }

    function showTabs(i = 0, link, content) {
        link[i].classList.add('active');
        content[i].classList.add('active');
    }

    function hideTabs(link, content) {
        for (let i = 0; i < link.length; i++) {
            link[i].classList.remove('active');
        }
        for (let i = 0; i < content.length; i++) {
            content[i].classList.remove('active');
        }
    }

    /* SHOW HIDE CONTENT */
    let footerLink = document.querySelectorAll('.footer__title'),
        footerContent = document.querySelectorAll('.footer__nav'),
        filterLink = document.querySelectorAll('.category-filter__header'),
        filterContent = document.querySelectorAll('.category-filter__content'),
        categoryBtn = document.querySelectorAll('.category-filter__btn'),
        categoryContent = document.querySelectorAll('.category-filter__wrapper'),
        jobLink = document.querySelectorAll('.job-item__header'),
        jobContent = document.querySelectorAll('.job-item__content'),
        faqLink = document.querySelectorAll('.faq-item__header'),
        faqContent = document.querySelectorAll('.faq-item__content');

    if (footerLink.length > 0) {
        toggleContent(footerLink, footerContent, 'footer__title');
    }
    if (filterLink.length > 0) {
        toggleContent(filterLink, filterContent, 'category-filter__header');
    }
    if (categoryBtn.length > 0) {
        toggleContent(categoryBtn, categoryContent, 'category-filter__btn');
    }
    if (jobLink.length > 0) {
        toggleContent(jobLink, jobContent, 'job-item__header');
    }
    if (faqLink.length > 0) {
        toggleContent(faqLink, faqContent, 'faq-item__header');
    }

    function toggleContent(link, content, linkClass) {
        document.addEventListener('click', (e) => {
            if (e.target && e.target.classList.contains(linkClass)) {
                e.preventDefault();
                for (let i = 0; i < link.length; i++) {
                    if (e.target == link[i]) {
                        link[i].classList.toggle('active');
                        content[i].classList.toggle('active');
                    }
                }
            }
        });
    }

    /* MORE BTN */
    let categoryLink = document.querySelector('.category-type__link'),
        categoryItems = document.querySelectorAll('.category-type__item.hidden'),
        trigger = true;

    if (categoryItems.length > 0) {
        showMore(categoryItems, categoryLink, 'category-type__link');
    }

    function showMore(items, link, linkClass, text) {

        document.addEventListener('click', (e) => {
            if (e.target && e.target.classList.contains(linkClass)) {
                e.preventDefault();
                for (let i = 0; i < items.length; i++) {
                    items[i].classList.toggle('active');
                    items[i].classList.toggle('animation-r-to-l');
                    if (trigger) {
                        link.querySelector('span').innerHTML = 'Скрыть';
                        trigger = false;
                    } else {
                        link.querySelector('span').innerHTML = 'Ещё';
                        trigger = true;
                    }
                }
            }
        });
    }


    let sliderBanner = new Swiper('.swiper-banner', {
        slidesPerView: 1,
        spaceBetween: 0,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        autoplay: {
            delay: 4000,
        },
        pagination: {
            el: '.swiper-pagination-banner',
            clickable: true,
        },

    });
    let sliderNewsBlock1 = new Swiper('.swiper-news-block-1', {
        slidesPerView: 1,
        spaceBetween: 30,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        pagination: {
            el: '.swiper-pagination-news-block-1',
            clickable: true,

        },
    });
    let sliderNewsBlock2 = new Swiper('.swiper-news-block-2', {
        slidesPerView: 1,
        spaceBetween: 30,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        pagination: {
            el: '.swiper-pagination-news-block-2',
            clickable: true,

        },
    });
    let sliderNewsBlock3 = new Swiper('.swiper-news-block-3', {
        slidesPerView: 1,
        spaceBetween: 30,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        pagination: {
            el: '.swiper-pagination-news-block-3',
            clickable: true,

        },
    });
    let sliderNewsBlock4 = new Swiper('.swiper-news-block-4', {
        slidesPerView: 1,
        spaceBetween: 30,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        pagination: {
            el: '.swiper-pagination-news-block-4',
            clickable: true,

        },
    });
    let sliderTags = new Swiper('.swiper-tags', {
        slidesPerView: "auto",
        spaceBetween: 20,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        navigation: {
            prevEl: '.tags__prev',
            nextEl: '.tags__next',
        },

    });
    let sliderRegion = new Swiper('.swiper-region', {
        slidesPerView: 1,
        spaceBetween: 0,
        observeParents: true,
        observer: true,
        allowSlidePrev: true,
        allowSlideNext: true,
        navigation: {
            prevEl: '.region__prev',
            nextEl: '.region__next',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
           991: {
                spaceBetween: 0,
                slidesPerView: 2,
            },

            1199: {
                spaceBetween: 0,
                slidesPerView: 2,
            },
        }

    });
    let galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 20,
        autoplay: true,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        slideToClickedSlide: true,
        touchRatio: 0.2,
        breakpoints: {
            0: {
                slidesPerView: 2,
            },
            575: {
                slidesPerView: 3,

            },
            767: {
                slidesPerView: 4,

            },
            991: {
                slidesPerView: 3,

            },
            1599: {
                slidesPerView: 4,
            },
        }
    });
    let galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 0,
        autoplay: true,
        navigation: {
            nextEl: '.product__next',
            prevEl: '.product__prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });

    /* RATING */
    let ratingParent = document.querySelector('.js-rating'),
        ratingInput = document.querySelector('#js-rating'),
        ratingStar = document.querySelectorAll('.js-rating > li');

    if (ratingParent) {
        ratingParent.addEventListener('click', (event) => {
            event.preventDefault();
            const target = event.target;
            if (target && target.tagName == 'LI') {
                for (let i = 0; i < ratingStar.length; i++) {
                    ratingStar[i].classList.remove('active')
                }
                for (let i = 0; i => ratingStar.length; i++) {
                    if (ratingStar[i] == target) {
                        ratingStar[i].classList.add('active');
                        ratingInput.value = ++i;
                        return
                    } else {
                        ratingStar[i].classList.add('active');
                    }
                }
            }

        });
    }
    /* card */

    let cards = document.querySelectorAll('.card'),
        oldPrice = document.querySelectorAll('.card__price'),
        newPrice = document.querySelectorAll('.card__price-b'),
        economy = document.querySelectorAll('.card__economy'),
        cardLike = document.querySelectorAll('.card__heart');
    document.addEventListener('click', (e) => {
        if (e.target && (e.target.classList.contains('card__heart') || e.target.classList.contains('js-card-heart'))) {
            e.preventDefault();
        }
    })
   
    if (cards) {
        toggleCardLike(cardLike);

        function toggleCardLike(like) {
            for (let i = 0; i < like.length; i++) {
                let trigger = false;
                if (like[i]) {
                    let heartColor = like[i].querySelector('.js-card-heart');
                    like[i].onclick = function (x) {
                        return function () {
                            if (heartColor) {
                                if (trigger) {
                                    heartColor.style.fill = "#ffd803";
                                    trigger = false;
                                } else {
                                    heartColor.style.fill = "#ff5307";
                                    trigger = true;
                                }
                            }

                        }
                    }(i)
                }
            }
        }
        for (let i = 0; i < cards.length; i++) {
            if(oldPrice && newPrice && economy[i]){
                let oldP = +oldPrice[i].innerHTML.replace(/\D+/g, ''),
                newP = +newPrice[i].innerHTML.replace(/\D+/g, ''),
                resultNum = oldP - newP,
                resultDec = (oldP - newP) / (oldP / 100);
                if (resultNum > 0) {
                    economy[i].innerHTML = `${resultNum} ₽ ${resultDec.toFixed(1)} %`;
                } else {
                    economy[i].innerHTML = '-';
                }
            }
            
           
        }
    }
    /* modal one click */
    let card = document.querySelectorAll('.card'),


        modalOneClickImg = document.querySelector('.modal-one-click__img img'),
        modalOneClickName = document.querySelector('.modal-one-click__name'),
        modalOneClickPrice = document.querySelector('.js-modal-one-click-price'),
        modalOneClickPriceOld = document.querySelector('.js-modal-one-click-price-old'),
        modalOneClickBtn = document.querySelectorAll('.js-one-click'),

        modalInputName = document.querySelector('#js-modal-one-click-name'),
        modalInputPrice = document.querySelector('#js-modal-one-click-price'),
        modalInputUrl = document.querySelector('#js-modal-one-click-url'),
        oneCardParent = document.querySelector('.product'),
        oneCardName = document.querySelector('.product__title'),
        oneCardPrice = document.querySelector('.product-price__new'),
        oneCardPriceOld = document.querySelector('.product-price__old'),
        oneCardImg = document.querySelector('.product__img img');


    if (cards || oneCardParent) {
        getCardInfoToModalOneClick(cards);
    }


    function getCardInfoToModalOneClick(cards) {
        for (let i = 0; i < cards.length; i++) {
            let cardPrice = cards[i].querySelector('.card__price-b'),
                cardPriceOld = cards[i].querySelector('.card__price'),
                cardName = cards[i].querySelector('.card__name'),
                cardImg = cards[i].querySelector('.card__img img');


            modalOneClickBtn[i].onclick = function (x) {
                return function () {
                    if (cardName) {
                        modalOneClickName.innerHTML = cardName.innerHTML;

                    }
                    if (cardPrice) {
                        modalOneClickPrice.innerHTML = cardPrice.innerHTML;

                    }
                    if (cardPriceOld) {
                        modalOneClickPriceOld.innerHTML = cardPriceOld.innerHTML;

                    }
                    if (cardImg) {
                        modalOneClickImg.src = cardImg.src;

                    }


                    if (modalInputName && modalInputPrice && modalInputUrl) {
                        modalInputName.value = cardName.innerHTML
                        modalInputPrice.value = cardPrice.innerHTML;
                        modalInputUrl.value = cardName.href;
                    }
                }
            }(i)
        }
    }

    if (oneCardParent) {
        oneCardParent.addEventListener('click', (e) => {
            e.preventDefault();
            if (e.target && e.target.classList.contains('js-product-one-click')) {
                modalOneClickName.innerHTML = oneCardName.innerHTML;

                modalOneClickPrice.innerHTML = oneCardPrice.innerHTML;

                modalOneClickPrice.innerHTML = oneCardPrice.innerHTML;
                modalOneClickPriceOld.innerHTML = oneCardPriceOld.innerHTML;


                modalOneClickImg.src = oneCardImg.src;

            }
            if (modalInputName) {
                modalInputName.value = oneCardName.innerHTML
                modalInputPrice.value = oneCardPrice.innerHTML;
                modalInputUrl.value = window.location;
            }
        });
    }

    /* VIDEO */
    function findVideos() {
        let videos = document.querySelectorAll('.video');

        for (let i = 0; i < videos.length; i++) {
            setupVideo(videos[i]);
        }
    }

    function setupVideo(video) {
        let link = video.querySelector('.video__link');
        let media = video.querySelector('.video__media');
        let button = video.querySelector('.video__button');
        let id = parseMediaURL(media);

        video.addEventListener('click', () => {
            let iframe = createIframe(id);

            link.remove();
            button.remove();
            video.appendChild(iframe);
        });

        link.removeAttribute('href');
        video.classList.add('video--enabled');
    }

    function parseMediaURL(media) {
        let regexp = /https:\/\/i\.ytimg\.com\/vi\/([a-zA-Z0-9_-]+)\/hqdefault\.jpg/i;
        let url = media.src;
        let match = url.match(regexp);

        return match[1];
    }

    function createIframe(id) {
        let iframe = document.createElement('iframe');

        iframe.setAttribute('allowfullscreen', '');
        iframe.setAttribute('allow', 'autoplay');
        iframe.setAttribute('src', generateURL(id));
        iframe.classList.add('video__media');

        return iframe;
    }

    function generateURL(id) {
        let query = '?rel=0&showinfo=0&autoplay=1';

        return 'https://www.youtube.com/embed/' + id + query;
    }

    findVideos();
});


/* АДАПТИВНОЕ ПЕРЕМЕЩЕНИЕ БЛОКОВ */
function DynamicAdapt(type) {
    this.type = type;
}

DynamicAdapt.prototype.init = function () {
    const _this = this;
    this.оbjects = [];
    this.daClassname = "_dynamic_adapt_";
    this.nodes = document.querySelectorAll("[data-da]");

    for (let i = 0; i < this.nodes.length; i++) {
        const node = this.nodes[i];
        const data = node.dataset.da.trim();
        const dataArray = data.split(",");
        const оbject = {};
        оbject.element = node;
        оbject.parent = node.parentNode;
        оbject.destination = document.querySelector(dataArray[0].trim());
        оbject.breakpoint = dataArray[1] ? dataArray[1].trim() : "767";
        оbject.place = dataArray[2] ? dataArray[2].trim() : "last";
        оbject.index = this.indexInParent(оbject.parent, оbject.element);
        this.оbjects.push(оbject);
    }

    this.arraySort(this.оbjects);

    this.mediaQueries = Array.prototype.map.call(this.оbjects, function (item) {
        return '(' + this.type + "-width: " + item.breakpoint + "px)," + item.breakpoint;
    }, this);
    this.mediaQueries = Array.prototype.filter.call(this.mediaQueries, function (item, index, self) {
        return Array.prototype.indexOf.call(self, item) === index;
    });

    for (let i = 0; i < this.mediaQueries.length; i++) {
        const media = this.mediaQueries[i];
        const mediaSplit = String.prototype.split.call(media, ',');
        const matchMedia = window.matchMedia(mediaSplit[0]);
        const mediaBreakpoint = mediaSplit[1];

        const оbjectsFilter = Array.prototype.filter.call(this.оbjects, function (item) {
            return item.breakpoint === mediaBreakpoint;
        });
        matchMedia.addListener(function () {
            _this.mediaHandler(matchMedia, оbjectsFilter);
        });
        this.mediaHandler(matchMedia, оbjectsFilter);
    }
};

DynamicAdapt.prototype.mediaHandler = function (matchMedia, оbjects) {
    if (matchMedia.matches) {
        for (let i = 0; i < оbjects.length; i++) {
            const оbject = оbjects[i];
            оbject.index = this.indexInParent(оbject.parent, оbject.element);
            this.moveTo(оbject.place, оbject.element, оbject.destination);
        }
    } else {
        for (let i = 0; i < оbjects.length; i++) {
            const оbject = оbjects[i];
            if (оbject.element.classList.contains(this.daClassname)) {
                this.moveBack(оbject.parent, оbject.element, оbject.index);
            }
        }
    }
};

DynamicAdapt.prototype.moveTo = function (place, element, destination) {
    element.classList.add(this.daClassname);
    if (place === 'last' || place >= destination.children.length) {
        destination.insertAdjacentElement('beforeend', element);
        return;
    }
    if (place === 'first') {
        destination.insertAdjacentElement('afterbegin', element);
        return;
    }
    destination.children[place].insertAdjacentElement('beforebegin', element);
}

DynamicAdapt.prototype.moveBack = function (parent, element, index) {
    element.classList.remove(this.daClassname);
    if (parent.children[index] !== undefined) {
        parent.children[index].insertAdjacentElement('beforebegin', element);
    } else {
        parent.insertAdjacentElement('beforeend', element);
    }
}

DynamicAdapt.prototype.indexInParent = function (parent, element) {
    const array = Array.prototype.slice.call(parent.children);
    return Array.prototype.indexOf.call(array, element);
};

DynamicAdapt.prototype.arraySort = function (arr) {
    if (this.type === "min") {
        Array.prototype.sort.call(arr, function (a, b) {
            if (a.breakpoint === b.breakpoint) {
                if (a.place === b.place) {
                    return 0;
                }

                if (a.place === "first" || b.place === "last") {
                    return -1;
                }

                if (a.place === "last" || b.place === "first") {
                    return 1;
                }

                return a.place - b.place;
            }

            return a.breakpoint - b.breakpoint;
        });
    } else {
        Array.prototype.sort.call(arr, function (a, b) {
            if (a.breakpoint === b.breakpoint) {
                if (a.place === b.place) {
                    return 0;
                }

                if (a.place === "first" || b.place === "last") {
                    return 1;
                }

                if (a.place === "last" || b.place === "first") {
                    return -1;
                }

                return b.place - a.place;
            }

            return b.breakpoint - a.breakpoint;
        });
        return;
    }
};

const da = new DynamicAdapt("max");
da.init();