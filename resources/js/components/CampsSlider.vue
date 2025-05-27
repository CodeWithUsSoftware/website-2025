<template>
<div class="carousel-container w-full max-w-7xl mx-auto px-4 relative">
    <Carousel ref="carousel" :wrap-around="false" :breakpoints="breakpoints" :settings="carouselSettings" @slide-start="checkNavButtons" >
        <Slide v-for="(topic, index) in camps_data" :key="index">
            <div class="relative w-full group m-1 bg-white border shadow-lg rounded-lg overflow-hidden transform transition-all duration-500 hover:shadow-2xl hover:-translate-y-1">
                <!-- Image with overlay gradient -->
                <div class="relative overflow-hidden">
                    <div>
                        <img :src="`https://portal.codewithus.com/images/topics/${topic.camps_banner_image}`" :alt="topic.altText" style="height: auto; width: 100%!important;" class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-70"></div>
                    </div>

                    <!-- Featured badge -->
                    <div v-if="topic.isFeatured" class="absolute top-3 left-3 bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md animate-pulse">
                        Featured
                    </div>

                    <!-- New badge -->
                    <div v-if="topic.isNew" class="absolute top-3 right-3 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                        New
                    </div>
                </div>

                <div class="space-y-1 p-3">
                    <h3 class="text-lg font-semibold text-left line-clamp-2 group-hover:text-primary transition-colors duration-300" style="padding:0;">
                        {{ topic.name }}
                    </h3>
                    <!-- <p class="text-left text-gray-600 text-sm">{{ topic.age || 'Ages 6-14'}}</p> -->
                    <p class="text-left text-gray-600 text-sm">Ages {{ topic.min_age || 6 }} to {{ topic.max_age || 14 }}</p>
                    <p class="text-left text-gray-600 text-sm">Starts at <span class="font-bold text-lg text-primary">${{ selected_location_price || 345 }}</span></p>
                    <div class="flex items-center gap-1 mt-2">
                        <span class="font-medium">{{ topic.stars_count || 4.92 }}</span>
                        <div class="flex text-yellow-400">
                            <svg v-for="i in 5" :key="i" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" :class="i <= Math.round(4.9) ? 'text-yellow-400' : 'text-gray-300'" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                            <span class="text-xs text-gray-500">({{ topic.reviews_count || 2375 }})</span>
                    </div>

                    <div class="flex items-center justify-between mt-3">
<!--                        <div class="flex items-center gap-2">-->
<!--                            <span class="font-bold text-lg text-primary">${{seasonal_camps_dp}}</span>-->
<!--                            <span class="text-sm text-gray-500 line-through">${{seasonal_camps_fp}}</span>-->
<!--                        </div>-->
                       <!-- <div class="text-xs text-white bg-red-500 px-2 py-1 rounded-md"> -->
<!--                            {{ topic.discount }}% OFF-->
<!--                        </div>-->
                    </div>

<!--                    <div class="flex mt-4 space-x-2">-->
<!--                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-md flex items-center">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />-->
<!--                            </svg>-->
<!--                            Premium-->
<!--                        </span>-->
<!--                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-md">Bestseller</span>-->
<!--                    </div>-->

                    <!-- CTA Button -->
                    <button class="w-full mt-4 bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors duration-300 transform hover:scale-[1.02] flex items-center justify-center" @click="topicSelected(topic)" v-if="!group_data.isGroupLimitExceeded">
                        Enroll Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <button class="w-full mt-4 bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors duration-300 transform hover:scale-[1.02] flex items-center justify-center" v-if="group_data.isGroupLimitExceeded">
                        Full
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>

                <!-- Hover Content -->
                <div class="absolute inset-0 bg-white border shadow-lg rounded-lg flex flex-col opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4 overflow-y-auto">
                    <div>
                        <h3 class="text-lg font-semibold text-left text-primary py-1">
                            {{ topic.name }}
                        </h3>
<!--                        <div class="flex items-center gap-2 text-sm mt-1">-->
<!--                            <div class="bg-primary text-white flex items-center gap-1 px-2 rounded-md text-xs">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor">-->
<!--                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />-->
<!--                                </svg>-->
<!--                                <span>Premium</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="space-y-2 mt-3 text-left">-->
<!--                            <p class="text-xs">CodeWithUs offers classes for young students to learn programming & grasp coding basics!</p>-->

<!--                        </div>-->
                    </div>

                    <div class="mt-3">
                        <ul class="space-y-2 text-left">
                            <li>
                                <div class="flex gap-2 items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <p class="text-xs">3500+ personalized projects to choose from.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <div class="flex gap-2 items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <p class="text-xs">Weekly price, no long-term commitment.</p>
                                </div>
                            </li>

                            <li>
                                <div class="flex gap-2 items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <p class="text-xs">Daily progress updates.</p>
                                </div>
                            </li>

                            <li>
                                <div class="flex gap-2 items-start">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-primary mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <p class="text-xs">Full day or Half day options.</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Bottom-aligned button -->
                    <div class="mt-auto pt-3">
                        <a :href="topic.slug !== 'artificial-intelligence' ? '/topics/'+topic.slug : '/topic/'+topic.slug" target="_blank" class="w-full text-primary py-2 rounded-md transition-colors duration-300 transform flex items-center justify-center">
                            More
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <button class="w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors duration-300 transform hover:scale-[1.02] flex items-center justify-center" @click="topicSelected(topic)" v-if="!group_data.isGroupLimitExceeded">
                            Enroll Now
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <button class="w-full bg-primary hover:bg-primary-dark text-white py-2 rounded-md transition-colors duration-300 transform hover:scale-[1.02] flex items-center justify-center" v-if="group_data.isGroupLimitExceeded">
                            Full
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </Slide>

        <!-- Custom Navigation Buttons -->
        <template #addons>
            <Navigation v-slot="{ next, prev }">
                <!-- Previous Button (Hidden in UI, used for keyboard navigation) -->
                <button id="prevBtn" @click="prev" class="hidden">
                    Previous
                </button>

                <!-- Next Button (Hidden in UI, used for keyboard navigation) -->
                <button id="nextBtn" @click="next" class="hidden">
                    Next
                </button>
            </Navigation>

            <!-- Custom Pagination -->
            <div class="flex justify-center mt-6 space-x-1">
                <button
                    v-for="(_, slideIndex) in slides"
                    :key="slideIndex"
                    @click="goToSlide(slideIndex)"
                    class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                    :class="[
                        currentSlide === slideIndex
                            ? 'bg-primary w-6'
                            : 'bg-gray-300 hover:bg-gray-400'
                    ]"
                ></button>
            </div>
        </template>
    </Carousel>
</div>
</template>

<script>
import {defineComponent, ref, onMounted, computed} from "vue";
import {Carousel, Slide, Pagination, Navigation} from "vue3-carousel";
import "vue3-carousel/dist/carousel.css";

export default defineComponent({
    props : ['camps_data','group_data','seasonal_camps_dp','seasonal_camps_fp','selected_location_price'],
    components: {Carousel, Slide, Pagination, Navigation},
    setup() {
        const carousel = ref(null);
        const isFirstSlide = ref(true);
        const isLastSlide = ref(false);
        const currentSlide = ref(0);

        const checkNavButtons = (event) => {
            currentSlide.value = event.currentSlide;
            isFirstSlide.value = event.currentSlide === 0;
            isLastSlide.value = event.currentSlide >= (event.slideCount - event.itemsToShow);
        };

        const prevSlide = () => {
            if (!isFirstSlide.value) {
                carousel.value?.prev();
            }
        };

        const nextSlide = () => {
            if (!isLastSlide.value) {
                carousel.value?.next();
            }
        };

        const goToSlide = (index) => {
            carousel.value?.slideTo(index);
        };

        onMounted(() => {
            checkNavButtons({
                currentSlide: 0,
                slideCount: 4,
                itemsToShow: 3,
            });
        });

        return {
            carousel,
            isFirstSlide,
            isLastSlide,
            currentSlide,
            prevSlide,
            nextSlide,
            checkNavButtons,
            goToSlide
        };
    },
    data() {
        return {
            carouselSettings: {
                snapAlign: 'start',
                wrapAround: false
            },
            slides: [
                {
                    image: "https://img-c.udemycdn.com/course/240x135/5170404_d282_9.jpg",
                    altText: "ChatGPT Course",
                    title: "The Complete AI Guide: Learn ChatGPT, Generative AI & More",
                    instructor: "Julian Melanson, Benza Maman",
                    rating: 4.7,
                    reviews: "45,277",
                    price: "$19.99",
                    originalPrice: "$129.99",
                    discount: 85,
                    isPremium: true,
                    isBestseller: true,
                    isFeatured: true,
                    isNew: false,
                    updatedDate: "July 2024",
                    duration: "12.5",
                    level: "All Levels",
                    description: "Master ChatGPT and other AI tools to enhance your productivity and create amazing content for any purpose.",
                    learningPoints: [
                        "How to use ChatGPT to enhance your daily productivity",
                        "Create compelling content with AI assistance",
                        "Build custom AI solutions for your specific needs"
                    ]
                },
                {
                    image: "https://img-c.udemycdn.com/course/240x135/2196488_8fc7_10.jpg",
                    altText: "AWS Course",
                    title: "Ultimate AWS Certified Solutions Architect Associate 2024",
                    instructor: "Stephane Maarek",
                    rating: 4.8,
                    reviews: "156,000",
                    price: "$19.99",
                    originalPrice: "$149.99",
                    discount: 87,
                    isPremium: true,
                    isBestseller: true,
                    isFeatured: false,
                    isNew: false,
                    updatedDate: "June 2024",
                    duration: "27",
                    level: "Intermediate",
                    description: "Pass the AWS Solutions Architect Associate Certification with flying colors and master AWS cloud architecture.",
                    learningPoints: [
                        "Pass the AWS Certified Solutions Architect Associate certification",
                        "Design and build scalable, highly available systems on AWS",
                        "Implement cost-effective solutions following AWS best practices"
                    ]
                },
                {
                    image: "https://img-c.udemycdn.com/course/240x135/1565838_e54e_16.jpg",
                    altText: "Web Development Course",
                    title: "The Complete 2024 Web Development Bootcamp",
                    instructor: "Dr. Angela Yu",
                    rating: 4.7,
                    reviews: "224,000",
                    price: "$19.99",
                    originalPrice: "$149.99",
                    discount: 87,
                    isPremium: true,
                    isBestseller: true,
                    isFeatured: false,
                    isNew: false,
                    updatedDate: "May 2024",
                    duration: "65",
                    level: "Beginner",
                    description: "Become a full-stack web developer with just one course. HTML, CSS, Javascript, Node, React, MongoDB and more!",
                    learningPoints: [
                        "Build 16 web development projects for your portfolio",
                        "Learn the latest technologies, including Javascript, React, Node and MongoDB",
                        "Build fully-fledged websites and web apps for your startup or business"
                    ]
                },
                {
                    image: "https://img-c.udemycdn.com/course/240x135/950390_270f_3.jpg",
                    altText: "Machine Learning Course",
                    title: "Machine Learning A-Z: Hands-On Python & R In Data Science",
                    instructor: "Kirill Eremenko, Hadelin de Ponteves",
                    rating: 4.5,
                    reviews: "156,789",
                    price: "$19.99",
                    originalPrice: "$149.99",
                    discount: 87,
                    isPremium: true,
                    isBestseller: true,
                    isFeatured: false,
                    isNew: false,
                    updatedDate: "April 2024",
                    duration: "44",
                    level: "All Levels",
                    description: "Learn to create Machine Learning Algorithms in Python and R from two Data Science experts.",
                    learningPoints: [
                        "Master Machine Learning on Python & R",
                        "Make robust Machine Learning models",
                        "Handle specific topics like Reinforcement Learning, NLP and Deep Learning"
                    ]
                },
                {
                    image: "https://img-c.udemycdn.com/course/240x135/5254186_8a3d.jpg",
                    altText: "ChatGPT Masterclass",
                    title: "ChatGPT Masterclass: Build Advanced AI Applications",
                    instructor: "Andrei Neagoie, Daniel Bourke",
                    rating: 4.7,
                    reviews: "3,892",
                    price: "$19.99",
                    originalPrice: "$149.99",
                    discount: 87,
                    isPremium: true,
                    isBestseller: false,
                    isFeatured: false,
                    isNew: true,
                    updatedDate: "July 2024",
                    duration: "18",
                    level: "Intermediate",
                    description: "Learn to build powerful AI applications using ChatGPT and other large language models.",
                    learningPoints: [
                        "Build real-world AI applications with ChatGPT",
                        "Understand how large language models work",
                        "Create custom AI solutions for business problems"
                    ]
                },
                {
                    image: "https://img-c.udemycdn.com/course/240x135/1242312_1b27_3.jpg",
                    altText: "CompTIA Course",
                    title: "CompTIA A+ Certification (220-1001): Complete Course",
                    instructor: "Jason Dion",
                    rating: 4.7,
                    reviews: "45,678",
                    price: "$19.99",
                    originalPrice: "$129.99",
                    discount: 85,
                    isPremium: true,
                    isBestseller: true,
                    isFeatured: false,
                    isNew: false,
                    updatedDate: "March 2024",
                    duration: "28",
                    level: "Beginner",
                    description: "Complete coverage of the CompTIA A+ certification exam objectives with hands-on examples.",
                    learningPoints: [
                        "Pass the CompTIA A+ 220-1001 certification exam",
                        "Troubleshoot hardware and software problems",
                        "Install and configure operating systems and hardware"
                    ]
                }
            ],
            breakpoints: {
                0: {
                    itemsToShow: 1,
                    snapAlign: 'start',
                    wrapAround: false
                },
                640: {
                    itemsToShow: 2,
                    snapAlign: 'start',
                    wrapAround: false
                },
                1024: {
                    itemsToShow: 4,
                    snapAlign: 'start',
                    wrapAround: false
                },
            },
        };
    },
    methods: {
        topicSelected(topic) {
            this.$emit("topic-selected", topic, this.group_data); // Pass the topic to the parent
        }
    }
});
</script>

<style scoped>
.carousel__slide {
    padding: 1px;
}

.carousel__viewport {
    perspective: 2000px;
    justify-content: flex-start !important;
}

.carousel__track {
    transform-style: preserve-3d;
    gap: 0 !important;
    justify-content: flex-start !important;
}

.carousel__slide--sliding {
    transition: 0.5s;
}

.carousel__slide {
    opacity: 0.9;
    transform: rotateY(-15deg) scale(0.9);
}

.carousel__slide--active ~ .carousel__slide {
    transform: rotateY(15deg) scale(0.9);
}

.carousel__slide--prev {
    opacity: 1;
    transform: rotateY(-8deg) scale(0.95);
}

.carousel__slide--next {
    opacity: 1;
    transform: rotateY(8deg) scale(0.95);
}

.carousel__slide--active {
    opacity: 1;
    transform: rotateY(0) scale(1.03);
}

.carousel__prev,
.carousel__next {
    box-sizing: content-box;
    border: 5px solid white;
}

/* Animation for badges */
@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

.animate-pulse {
    animation: pulse 2s infinite;
}

/* Additional spacing adjustments */
.carousel-container {
    overflow: hidden;
}

/* Force left alignment for fewer items */
.carousel__viewport {
    display: flex !important;
    justify-content: flex-start !important;
}

.carousel__track {
    display: flex !important;
    justify-content: flex-start !important;
    align-items: flex-start !important;
}

/* When there are fewer items, align them to the left */
@media (min-width: 1024px) {
    .carousel__track {
        justify-content: flex-start !important;
        align-items: flex-start !important;
    }

    .carousel__viewport {
        justify-content: flex-start !important;
    }
}

/* Make cards more compact */
.space-y-1 > * + * {
    margin-top: 0.15rem;
}

/* Adjust image height for better proportions */
.relative.overflow-hidden img {
    height: 160px;
}

/* Reduce padding in hover content */
.absolute.inset-0.bg-white {
    padding: 0.75rem;
}

/* Reduce space between items in learning points */
.space-y-2.text-left {
    margin-top: 0.5rem;
}

.space-y-2 > * + * {
    margin-top: 0.35rem;
}

/* Adjust the breakpoints to show more items */
@media (min-width: 1024px) {
    .carousel__slide {
        padding: 0;
        margin-right: -5px;
    }
}
</style>


