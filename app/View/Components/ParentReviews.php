<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ParentReviews extends Component
{
    public $result = [
        [
          'source' => 'Google',
          'parent' => 'Yeonhee L',
          'review' => 'My two sons are enjoying small group Java and Python classes in CodeWithUs. Their teacher is spontaneous at what the kid needs and parents inquire about. I am not the Cs professional but definitely can see they are enjoying their classes and learning something new every class!!.'
       ],
        [
          'source' => 'Yelp',
          'parent' => 'Irit E',
          'review' => 'My teen daughter learns how to code here. I am so impressed by how quickly she progressed. Her instructor is one of the nicest and most patient teachers I met.There\'s even a place where a parent can sit, read magazines or work on their laptop while their kid is going through a lesson. Starbucks and Subway across the street too.'
       ],
        [
          'source' => 'Groupon',
          'parent' => 'Jamie',
          'review' => 'Amazing live one-on-one sessions with patient and knowledgeable teachers. My son learned so much each class and super eager to continue attending.'
       ],
        [
          'source' => 'Google',
          'parent' => 'Dana M',
          'review' => 'My 6 year old loves Scratch coding with his teacher Jessie! He’s inventing new projects and is motivated to continually improve. The instruction is tailored to his ability and allows him to build his skills with every class. Thank you, Jessie, and the CWU team for creating a curriculum that is both fun and educational.'
       ],
        [
          'source' => 'Google',
          'parent' => 'Chrissy S',
          'review' => 'My son really enjoys working with Tyler and gets a lot of good feedback and explanations of the code he is looking at. As a parent I really enjoy the notes from the sessions that are sent to me after each class.'
       ],
        [
          'source' => 'Google',
          'parent' => 'Evette W',
          'review' => 'The Teachers are Amazing and very kind 🙏🙏. My son looks forward to learning more lessons every week! He can’t stop talking about his coding class.'
       ],
    ];


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.parent-reviews');
    }
}
