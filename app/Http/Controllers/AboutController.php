<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index()
  {
    $teamMembers = [
      [
        'name' => 'John Smith',
        'position' => 'Chief Executive Officer',
        'image' => asset('images/team/ceo.jpg'),
        'linkedin' => 'https://linkedin.com/in/johnsmith',
      ],
      [
        'name' => 'Sarah Johnson',
        'position' => 'Chief Operations Officer',
        'image' => asset('images/team/coo.jpg'),
        'linkedin' => 'https://linkedin.com/in/sarahjohnson',
      ],
      [
        'name' => 'David Banda',
        'position' => 'Country Manager - Malawi',
        'image' => asset('images/team/malawi-manager.jpg'),
        'linkedin' => 'https://linkedin.com/in/davidbanda',
      ],
      [
        'name' => 'Grace Tembo',
        'position' => 'Country Manager - Zambia',
        'image' => asset('images/team/zambia-manager.jpg'),
        'linkedin' => 'https://linkedin.com/in/gracetembo',
      ],
      [
        'name' => 'Michael Chang',
        'position' => 'Technical Director',
        'image' => asset('images/team/tech-director.jpg'),
        'linkedin' => 'https://linkedin.com/in/michaelchang',
      ],
      [
        'name' => 'Lisa Phiri',
        'position' => 'Marketing Director',
        'image' => asset('images/team/marketing-director.jpg'),
        'linkedin' => 'https://linkedin.com/in/lisaphiri',
      ],
    ];

    $milestones = [
      [
        'year' => '2010',
        'title' => 'Foundation',
        'description' => 'FirstMark Advertising established in Lilongwe, Malawi.',
      ],
      [
        'year' => '2012',
        'title' => 'Expansion Begins',
        'description' => 'Extended operations to major cities across Malawi.',
      ],
      [
        'year' => '2015',
        'title' => 'Digital Integration',
        'description' => 'Introduced digital billboards in prime locations.',
      ],
      [
        'year' => '2018',
        'title' => 'Zambia Entry',
        'description' => 'Successfully expanded operations into Zambia.',
      ],
      [
        'year' => '2020',
        'title' => 'Innovation Leader',
        'description' => 'Launched innovative LED billboard network.',
      ],
      [
        'year' => '2023',
        'title' => 'Market Leadership',
        'description' => 'Became the leading outdoor advertising company in both markets.',
      ],
    ];

    $coverageCities = [
      // Malawi Cities
      [
        'name' => 'Lilongwe',
        'country' => 'Malawi',
        'lat' => -13.9626,
        'lng' => 33.7741,
      ],
      [
        'name' => 'Blantyre',
        'country' => 'Malawi',
        'lat' => -15.7861,
        'lng' => 35.0058,
      ],
      [
        'name' => 'Mzuzu',
        'country' => 'Malawi',
        'lat' => -11.4656,
        'lng' => 34.0207,
      ],
      [
        'name' => 'Zomba',
        'country' => 'Malawi',
        'lat' => -15.3833,
        'lng' => 35.3333,
      ],
      // Zambia Cities
      [
        'name' => 'Lusaka',
        'country' => 'Zambia',
        'lat' => -15.4167,
        'lng' => 28.2833,
      ],
      [
        'name' => 'Kitwe',
        'country' => 'Zambia',
        'lat' => -12.8024,
        'lng' => 28.2132,
      ],
      [
        'name' => 'Ndola',
        'country' => 'Zambia',
        'lat' => -12.9587,
        'lng' => 28.6366,
      ],
      [
        'name' => 'Livingstone',
        'country' => 'Zambia',
        'lat' => -17.8419,
        'lng' => 25.8542,
      ],
    ];

    return view('pages.about', compact('teamMembers', 'milestones', 'coverageCities'));
  }
}
