<?php

namespace App\Http\Controllers;
use App\Models\Topic;
use App\Models\StudentSpotLight;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected $topicResource = [
        'topics_data' => [
            'scratch' => [
              'ages' => 'Age 6-12',
              'faqs' => [
                'question_1' =>'What is Scratch?',
                'answer_1' =>'The Scratch program is a block-based visual programming language primarily for children ages 6-12. It is a great tool for beginners to effectively get introduced to the vast field of coding with a strong foundation. With Scratch, children can design and program interactive stories, games, and animation, and share with people from all over the world. As children create with Scratch, they learn to think creatively, work collaboratively, and reason systematically. The service is developed by the MIT Lab, has been translated into 70+ languages, and is used in most parts of the world.',
                'question_2' => 'Who is Scratch for?',
                'answer_2' => 'The Scratch program is for children between the ages of 6-12 who know how to read at least at a first grade level. Scratch is the best place for students who are new to coding! The drag and drop feature of Scratch is perfect for students who are not yet proficient at typing. We accept all experience levels into our Scratch classes including beginners, intermediate and advanced students.',
                  'question_3' => 'When are Scratch classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Scratch program last?',
                'answer_4' => 'Based on our observation, the beginner Scratch program may last for approximately 6 months. Within that timeline, our teachers will work with the student on projects to complete Scratch level 1, 2 and 3 and prepare the student to be transitioned over to a more advanced topic like Python, JavaScript or Robotics. If the student is interested, the teachers can also work with the student on more advanced levels of Scratch (level 4+).'
                ,'question_5' => 'What is required to learn Scratch?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer.Do NOT use a tablet for the Scratch program.</li><li>- Running Scratch 3.0 requires a relatively new web browser=> Chrome or Mobile Chrome 63 or higher, Edge 15 or higher, Firefox 57 or higher, Safari or Mobile Safari 11 or higher. Internet Explorer is NOT supported.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
            'topic_description' => 'Scratch is a visual programming language developed by MIT where students can create interactive stories, animations, games, and simulations. Our Scratch coding class will teach students the basics of programming concepts such as loops, variables, and conditionals using the Scratch programming environment. Students will learn how to create and customize sprites, control their movement and interactions, and create interactive animations and games. The class will allow students to share their project creations and collaborate with other students.',
              'review' => [
                'description' => 'I loved this Scratch course! Rather than the course I loved the teacher, Daniel is pretty awesome and he got me to love coding!',
                'name' => 'John Akerman, Scratch student at Code With Us'
              ]
            ],
            'minecraft' => [
              'ages' => 'Age 6-18',
              'faqs' => [
                'question_1' => 'What is Minecraft Modding?',
                'answer_1' => 'Code with Us offers classes for young students to learn how to mod the popular Minecraft game. Our classes will teach essential coding skills like loops, conditionals, and more! Students will be exposed to the basics of programming while they build their first worlds. This course covers buttons, mouse manipulation, setting blocks – anything that can\'t be done just by typing and drag & drop! See code take shape before your eyes as you combine graphics with snippets of blockly and JavaScript code.'
                ,'question_2' => 'Who is Minecraft for?',
                'answer_2' => 'Minecraft modding is for anyone who enjoys the game! Typically we recommend ages 8 and above for this topic because the blocks used are more complex compared to Scratch. Our program allows students to customize the game they love in fun and creative ways.'
                ,'question_3' => 'When are Minecraft classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Minecraft program last?',
                'answer_4' => 'Our Minecraft classes last 6 months typically, based on the students pace. By the end of 6 months students will have made several modifications to the game including making in-game pacman, star wars mods, in-game pokemon, magical wands, a zoon, and much more!'
                ,'question_5' => 'What is required to learn Minecraft?',
                'answer_5' => '<html><body><ul><li>- Before the class students must have minecraft launcher installed (you can use your own account or one of ours)<li>&nbsp;&nbsp;&nbsp;&nbsp;- <a href=>"https=>//www.minecraft.net/en-us/download"> https=>//www.minecraft.net/en-us/download</a></li></li><li>- If you would like to have your own Learn-to-mod account it costs $30/year, if not you will check out one of our accounts.<li>&nbsp;&nbsp;&nbsp;&nbsp;- <a href=>"https=>//www.learntomod.com/sign-up-2.html">https=>//www.learntomod.com/sign-up-2.html</a></li></li><li>- Computer/laptop with solid internet and that can run Minecraft.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => '',
              'review' => [
                'description' => 'Fun, practical and engaging Minecraft activities and projects. My son is absolutely loving it! I’m always looking for ways to make the games he plays into teachable moments, and the idea that minecraft coding is on the table makes this course an easy sell.',
                'name' => 'Peter, Minecraft student at Code With Us'
              ]
            ],
            'python' => [
              'ages' => 'Age 8-18',
              'faqs'=> [
                'question_1' => 'What is Python?',
                'answer_1' => 'Python is a programming language used to make Web applications, games, and more. Python is great for beginners because of its easy to learn syntax that at times reads like english. By learning Python students will master important computer science concepts that will position them well for more advanced classes in the future. '
                ,'question_2' => 'Who is Python for?',
                'answer_2' => 'Python is for beginners that are 9 years old or older. Since it is easy to read and type, Python is typically the next topic students do after mastering Scratch. In professional settings, Python is used for artificial intelligence, data science, quality assurance, and automation.'
                ,'question_3' => 'When are Python classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Python program last?',
                'answer_4' => 'Our Python program is set to the pace of the student. Typically after a year, students should be sound in Python programming fundamentals such as variables, if statements, for loops, lists, dictionaries, classes, inheritance, pygal, pygame, and much more. Students can switch to another topic after mastering the fundamentals or can continue to build bigger custom projects with their instructor to further master Python.'
                ,'question_5' => 'What is required to learn Python?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer with good internet.</li><li>- Chrome or Mobile Chrome 63 or higher, Edge 15 or higher, Firefox 57 or higher, Safari or Mobile Safari 11 or higher. Internet Explorer is NOT supported.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => 'Python is a general-purpose and the most popular programming language by professionals. Our Python coding class will introduce students to the basics of programming using the Python programming language. Students will learn how to write and understand code, including concepts such as variables, data types, loops, and functions. The class will cover the basics of Python syntax and control structures, as well as introduce students to more advanced topics such as object-oriented programming and file input/output. The class will include hands-on projects and exercises to help students apply their new knowledge and develop problem-solving skills. By the end of the class, students should have a strong foundation in Python and be able to write simple programs and scripts to accomplish specific tasks.',
              'review' => [
                'description' => 'Great instructor, helped my son understand and think about the Python lessons and projects, even talking about them days later!',
                'name' => 'Benjamin, Python student at Code With Us'
              ]
            ],
            'javascript' => [
              'ages' => 'Age 10-18',
              'faqs' => [
                'question_1' => 'What is JavaScript?',
                'answer_1' => 'JavaScript is a programming language primarily used for web development. It has become one of the most popular languages due to its availability to adapt. Currently there are many different variations of Javascript that are employed in applications everyone uses daily. '
                ,'question_2' => 'Who is JavaScript for?',
                'answer_2' => 'Javascript is for anyone that is interested in building websites and web applications. Javascript can be used to make sites more interactive and handle user data. It can also be used to dynamically build pages which can make growing and managing large scale websites much easier. Our recommendation is that Javascript students should be familiar with coding and be 9 years or older.'
                ,'question_3' => 'When are JavaScript classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the JavaScript program last?',
                'answer_4' => 'Our Javascript program is set to the pace of the student. Typically after a year, students should be sound in Javascript programming fundamentals such as variables, if statements, for loops, lists, JSON, classes, inheritance, and much more. Students can switch to another topic after mastering the fundamentals or can continue to build bigger custom projects with their instructor to further master Javascript. '
                ,'question_5' => 'What is required to learn JavaScript?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer with good internet.</li><li>- Chrome or Mobile Chrome 63 or higher, Edge 15 or higher, Firefox 57 or higher, Safari or Mobile Safari 11 or higher. Internet Explorer is NOT supported.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => 'In this class, students will learn the basics of web design using HTML, CSS, and JavaScript. HTML (Hypertext Markup Language) will be used to create the structure and content of web pages, CSS (Cascading Style Sheets) will be used to style and layout those pages, and JavaScript will be used to add interactivity and dynamic behavior to the site. The class will cover topics such as creating and editing HTML and CSS code, implementing responsive design, using CSS frameworks, and working with JavaScript to create interactive elements like forms and animations. By the end of the class, students will have a solid understanding of web design and will have created their own functional website.',
              'review' => [
                'description' => 'My daughter has been loving the JavaScript class. She feels like she\'s progressing quickly with web design. The feedback from the teacher is very appreciated.',
                'name' => 'Evie, JavaScript student at Code With Us'
              ]
            ],
            'arduino' => [
              'ages' => 'Age 10-18',
              'faqs' => [
                'question_1' => 'What is Arduino?',
                'answer_1' => 'Arduino is an open-source electronics platform based on easy-to-use hardware and software. Arduino boards are able to read inputs - light on a sensor, a finger on a button, or a Twitter message - and turn it into an output - activating a motor, turning on an LED, publishing something online. You can tell your board what to do by sending a set of instructions to the microcontroller on the board. To do so you use the Arduino programming language (based on Wiring), and the Arduino Software (IDE), based on Processing.Over the years Arduino has been the brain of thousands of projects, from everyday objects to complex scientific instruments. A worldwide community of makers - students, hobbyists, artists, programmers, and professionals - has gathered around this open-source platform, their contributions have added up to an incredible amount of accessible knowledge that can be of great help to novices and experts alike.'
                ,'question_2' => 'Who is Arduino for? ',
                'answer_2' => 'Arduino is a great robotics and electronics introduction for kids 10 years and up. Arduino is a great platform to experience and create your own hardware without prior programming or electronics knowledge.'
                ,'question_3' => 'When are Arduino classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Arduino program last?',
                'answer_4' => 'In our Arduino program students will learn how to control various robotic components and how to combine those components functions using C++ programming. Based on our observation, the beginner Arduino program may last for approximately 9 months. Within that timeline, our teachers will work with the student on projects to complete Arduino level 1, 2 and 3.'
                ,'question_5' => 'What is required to learn Arduino?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer. Do NOT use a tablet for the Arduino program.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => '',
              'review' => [
                'description' => 'We had a wonderful experience going through the Code With Us on-site Robotics boot camp. The learning platform was well designed and Arduino contents are engaging for middle schoolers.',
                'name' => 'Jordyn, Arduino Robotics student at Code With Us'
              ]
            ],
            'java' => [
              'ages' => 'Age 10-18',
              'faqs' => [
                'question_1' => 'What is Java?',
                'answer_1' => 'Java is a programming language used to make applications. It has become the premier language for business applications because of its ability to run on any device. Once used for web applications, it is now primarily used for mobile devices and desktop applications. '
                ,'question_2' => 'Who is Java for? ',
                'answer_2' => 'Java is mostly for adults and high schoolers due to its difficulty and heavy syntax. The AP college board test is currently done in Java and that is why it is popular among high school students. Our recommendation is that Java students be familiar with coding fundamentals and be 13+ years of age.'
                ,'question_3' => 'When are Java classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Java program last?',
                'answer_4' => 'Our Java program is set to the pace of the student. Typically after a year, students should be sound in Java programming fundamentals such as variables, if statements, for loops, lists, recursion, classes, inheritance, and much more. Students can switch to another topic after mastering the fundamentals or can continue to build bigger custom projects with their instructor to further master Java. '
                ,'question_5' => 'What is required to learn Java?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer with good internet.</li><li>- Chrome or Mobile Chrome 63 or higher, Edge 15 or higher, Firefox 57 or higher, Safari or Mobile Safari 11 or higher. Internet Explorer is NOT supported.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => 'In this class, students will learn the basics of programming using the Java language. Java is a popular, powerful, and versatile programming language that is widely used in industry for building a variety of applications including web, mobile, and desktop applications. The class will cover topics such as fundamental programming concepts, data types, control structures, object-oriented programming, and working with classes and objects. Students will learn how to write, debug and test programs, use Java libraries and frameworks to build applications. Additionally, students will work on several programming projects to apply their knowledge and gain practical experience. By the end of the class, students will have a solid foundation in programming and will be able to write their own Java programs.',
              'review' => [
                'description' => 'My son has been in the Java class for quite a few months and he loves it! Seems like he learns something new each week. Highly recommend it!',
                'name' => 'Evan, Java student at Code With Us'
              ]
            ],
            'roblox' => [
              'ages' => 'Age 6-18',
              'faqs' => [
                'question_1' => 'What is Roblox?',
                'answer_1' => 'Roblox is a popular computer game loved by gamers of all ages. In this course students will learn how to make Roblox games using Roblox studio and the programming language known as Lua. Topics covered included hierarchy, variables, loops, if statements, roblox commands, and more.'
                ,'question_2' => 'Who is Roblox for?',
                'answer_2' => 'Roblox is for older students, typically 12+, who enjoy the game and want to make their own within the Roblox environment. It is recommended that students master the fundamentals of Python because of its similarities to Lua. Learning coding basics outside of Roblox studio is important for student success.'
                ,'question_3' => 'When are Roblox classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Roblox program last?',
                'answer_4' => 'Our Roblox program is set to the pace of the student. Typically after a year, students should be sound in Lua programming fundamentals such as variables, if statements, for loops, lists, recursion, classes, inheritance, and much more. Students can switch to another topic after mastering the fundamentals or can continue to build bigger custom projects with their instructor to further master Lua in Roblox studio.'
                ,'question_5' => 'What is required to learn Roblox?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer with good internet.</li><li>- Must have Roblox and Roblox Studio downloaded<li>&nbsp;&nbsp;&nbsp;&nbsp;- <a href=>"https=>//www.roblox.com/create">https=>//www.roblox.com/create</a></li></li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => '',
              'review' => [
                'description' => 'My 12 year old really enjoyed the Roblox class and the instructor, Caleb. He was very proud of the game he produced.',
                'name' => 'Cooper, Roblox student at Code With Us'
              ]
            ],
            'open_topic' => [
              'ages' => 'Age 5-18',
              'faqs'=>[
                'question_1' => 'What is Open topic?',
                'answer_1' => ''
                ,'question_2' => 'Who is Open topic for?',
                'answer_2' => 'Open topic is for students that aren’t sure where to start. The instructor will start them on a topic they feel fits the students\' understanding and interests.'
                ,'question_3' => 'When are Open topic classes available?',
                'answer_3' => 'Coding Classes are available 7 days a week all year-round and we guarantee we can work with your schedule. Students have the options to takes classes either once a week or twice a week. Each coding class is one hour and is always customized to match a student\'s experience level and interests. Your child can start taking classes with us in a week or less! To schedule classes and check out the class options click <a href=>"/monthly-subscriptions">here</a>.'
                ,'question_4' => 'How long does the Open topic program last?',
                'answer_4' => 'The open topic label lasts as long as you would like. Typically after an instructor assigns you a topic you will be placed in that topic until you or the instructor decide to move to another topic.'
                ,'question_5' => 'What is required to learn Open topic?',
                'answer_5' => '<html><body><ul><li>- Laptop or Computer with good internet.</li><li>- Chrome or Mobile Chrome 63 or higher, Edge 15 or higher, Firefox 57 or higher, Safari or Mobile Safari 11 or higher. Internet Explorer is NOT supported.</li><li>- Working microphone and speaker. Camera is optional.</li><li>- Use a headphone/headset for the best experience.</li></ul></body></html>'
              ],
                'topic_description' => '',
              'review' => [
                'description' => 'This class has been so much fun and informative for my 10 year old daughter. The instructor is patient and interested in everything she has to share and let’s her decide which projects to work on next. Definitely a great way to learn and practice coding skills.',
                'name' => 'Kayleigh, student at Code With Us'
              ]
            ],
          ]
    ];

    public function getTopicSpotLight()
    {
        $topics = Topic::where(['is_product'=> 1, 'pricing' => 1])->orderBy('sort', 'asc')->where('is_deleted',false)->limit(6)->get();

        $studentSpotLights  = StudentSpotLight::orderBy('created_at', 'desc')->with(['tags','topics'])->where('is_deleted',false)->limit(6)->get();

        return view('index', compact('topics','studentSpotLights'));
    }

    public function getTopicsAndSpotlights()
    {
      $topics = Topic::where(['is_product'=> 1, 'pricing' => 1])->orderBy('sort', 'asc')->where('is_deleted',false)->limit(4)->get();

      $studentSpotLights  = StudentSpotLight::orderBy('created_at', 'desc')->with(['tags','topics'])->where('is_deleted',false)->get();

        //return view('school-program', compact('topics','studentSpotLights'));
        return view('school-program-checkout', compact('topics','studentSpotLights'));
    }

    public function getSpotLight()
    {
        $studentSpotLights  = StudentSpotLight::orderBy('created_at', 'desc')->with(['tags','topics'])->where('is_deleted',false)->get();

        return view('student_spotlight', compact('studentSpotLights'));
    }

    public function getTopicsSlug($slug)
    {
        $topic = Topic::where('slug', $slug)->where('is_deleted', 0)->first();
        // $topicResource=$this->topicResource;
        $topicResource=$topic;
        $topicFaqs=($topic->faqs)?json_decode($topic->faqs):'';
        return view('topics', compact('topic','topicResource','topicFaqs'));
    }

}

