    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @vite('resources/js/app.js')
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href='https://eduvibe.html.devsvibe.com/assets/css/vendor/remixicon.css' rel='stylesheet'>
    @yield('header_scripts')
    {{-- @if(url()->current() !== route('home'))
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('blockly/blocklyJs.js')}}"></script>
    @endif --}}

    <script>
        const getBrowserName = () => {
          let browserInfo = navigator.userAgent;
          let browser;
          if (browserInfo.includes('Opera') || browserInfo.includes('Opr')) {
            browser = 'Opera';
          } else if (browserInfo.includes('Edg')) {
            browser = 'Edge';
          } else if (browserInfo.includes('Chrome')) {
            browser = 'Chrome';
          } else if (browserInfo.includes('Safari')) {
            browser = 'Safari';
          } else if (browserInfo.includes('Firefox')) {
            browser = 'Firefox'
          } else {
            browser = 'unknown'
          }
            return browser;
        }

        document.addEventListener("DOMContentLoaded", function () {
            const browserName = getBrowserName();
            if(browserName != "Safari"){
                var s = document.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8821477422662440";
                s.crossorigin = "anonymous";
                document.head.append(s);
            }
        });


      </script>

    <link href="https://cdn.jsdelivr.net/npm/@n8n/chat/dist/style.css" rel="stylesheet" />

    <script type="module">
        import { createChat } from 'https://cdn.jsdelivr.net/npm/@n8n/chat/dist/chat.bundle.es.js';

        createChat({
            webhookUrl: 'https://automations.savyapps.com/webhook/d4121d78-49db-4ad7-b026-b028671adf6b/chat',
            webhookConfig: {
                method: 'POST',
                headers: {}
            },
            target: '#n8n-chat',
            mode: 'window',
            chatInputKey: 'chatInput',
            chatSessionKey: 'sessionId',
            metadata: {},
            showWelcomeScreen: false,
            defaultLanguage: 'en',
            initialMessages: [
                'Hi there! 👋',
                'I am CodeWithUs Assistant. How can I assist you today?'
            ],
            i18n: {
                en: {
                    title: 'Hi there! 👋',
                    subtitle: "We're here to help you 24/7.",
                    footer: '',
                    getStarted: 'New Conversation',
                    inputPlaceholder: 'Type your question..',
                },
            },
        });
    </script>

    <style>
        #n8n-chat .chat-message {
            display: block;
            padding: 3px;
            padding-left: 10px;
            padding-right: 10px;
        }

        #n8n-chat .chat-message p {
            font-weight: 400;
        }

        #n8n-chat .chat-message-markdown {
            font-size: 85%;
        }

        #n8n-chat ol, #n8n-chat ul, #n8n-chat menu {
            font-size: 11px;
        }

        #n8n-chat .chat-message-from-user p {
            color: white;
        }
    </style>
