<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'title' => 'How do I create an account and log in?',
                'description' => 'Steps to register a new account and access HelloWorld.',
                'body' => "To start using HelloWorld, click Sign Up on the homepage and enter your email address and a secure password. You’ll receive a confirmation email — click the link to verify your account.\nOnce verified, you can log in anytime using your registered email and password. If you forget your password, use the Forgot Password link to reset it.",
            ],
            [
                'title' => 'How can I generate a marketing email with HelloWorld?',
                'description' => 'Guide to creating your first AI-powered email.',
                'body' => "Log in to your HelloWorld account.\n\nClick Create New Email.\n\nEnter the campaign details (product, audience, tone, goal).\n\nThe AI will generate a draft email.\n\nReview and edit if needed, then click Save or Send.\nHelloWorld makes it easy to produce high-quality marketing emails in minutes.",
            ],
            [
                'title' => 'What are the subscription plans and billing options?',
                'description' => 'Information about pricing tiers and payments.',
                'body' => "HelloWorld offers flexible subscription plans:\n\nFree Plan: Limited monthly emails.\n\nPro Plan: Unlimited emails, advanced templates, and priority support.\n\nEnterprise Plan: Custom features and dedicated account management.\n\nBilling is processed monthly or annually through secure payment providers. You can update your payment method anytime from the Billing section in your dashboard.",
            ],
            [
                'title' => 'Why didn`t my email send or arrive?',
                'description' => 'Common issues and solutions for email delivery.',
                'body' => "If your email did not send or arrive, try these steps:\n\nEnsure you verified your sender domain in the Settings section.\n\nCheck your internet connection and retry sending.\n\nLook in your Spam/Junk folder.\n\nVerify that you haven’t reached your plan’s sending limit.\n\nIf the problem continues, contact our support team with the campaign ID for further assistance.",
            ],
            [
                'title' => 'How does HelloWorld keep my data safe?',
                'description' => 'Overview of our security and privacy practices.',
                'body' => "HelloWorld takes security seriously. We use:\n\nSSL encryption for all data transfers.\n\nSecure servers with regular updates.\n\nGDPR-compliant practices for handling personal data.\n\nStrict access controls to protect sensitive information.\n\nYour email content and account details are never shared with third parties without your consent.",
            ],
            [
                'title' => 'Can I customize the email templates?',
                'description' => 'Options for personalizing HelloWorld templates.',
                'body' => "Yes! HelloWorld provides a library of ready-to-use templates. You can:\n\nChange text, images, and call-to-action buttons.\n\nAdjust the tone (formal, casual, friendly, etc.).\n\nSave your customized template for future use.\n\nTo edit, open the Templates section, choose a template, and click Customize.",
            ],
            [
                'title' => 'How do I invite my team members?',
                'description' => 'Adding and managing team accounts.',
                'body' => "With the Pro and Enterprise plans, you can invite team members to work together:\n\nGo to Settings > Team.\n\nEnter their email address and select their role (Admin, Editor, Viewer).\n\nThey will receive an invitation link.\n\nThis feature helps marketing teams collaborate on campaigns efficiently.",
            ],
            [
                'title' => 'Which languages does HelloWorld support?',
                'description' => 'Available languages for email generation.',
                'body' => "HelloWorld currently supports 15+ languages, including English, Spanish, French, German, Italian, and more.\nTo generate an email in another language:\n\nStart a new email.\n\nSelect the language from the Language dropdown.\n\nThe AI will create the content in that language automatically.",
            ],
            [
                'title' => 'What platforms can I integrate HelloWorld with?',
                'description' => 'Connecting HelloWorld to your favorite tools.',
                'body' => "HelloWorld integrates with popular marketing platforms and CRMs, such as:\n\nMailchimp\n\nHubSpot\n\nSalesforce\n\nZapier\n\nTo connect, go to Settings > Integrations and follow the setup instructions. This allows you to send emails directly from your existing workflows.",
            ],
            [
                'title' => 'How can I cancel my subscription?',
                'description' => 'Steps to stop or pause your plan.',
                'body' => "You can cancel your subscription anytime by:\n\nLogging in to your HelloWorld dashboard.\n\nGoing to Billing > Manage Plan.\n\nClicking Cancel Subscription.\n\nYour plan will remain active until the end of the billing cycle. You can also downgrade to the free plan instead of canceling completely.",
            ],
        ];

        foreach ($documents as $data) {
            \App\Models\Document::create($data);
        }
    }
}
