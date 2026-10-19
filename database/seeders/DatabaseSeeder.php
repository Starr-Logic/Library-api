<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $novel   = BookType::create(['BookTypeName' => 'Novel']);
        $science = BookType::create(['BookTypeName' => 'Science']);
        $tech    = BookType::create(['BookTypeName' => 'Technology']);

        $a1 = Author::create([
            'AuthorName' => 'Sok Dara', 'Gender' => 'Male', 'DOB' => '1985-03-12',
            'POB' => 'Phnom Penh', 'Address' => 'Phnom Penh', 'Phone' => '012345678',
            'Email' => 'sokdara@example.com', 'Photo' => 'sokdara.jpg',
        ]);
        $a2 = Author::create([
            'AuthorName' => 'Chan Sreyneang', 'Gender' => 'Female', 'DOB' => '1990-07-25',
            'POB' => 'Siem Reap', 'Address' => 'Siem Reap', 'Phone' => '098765432',
            'Email' => 'sreyneang@example.com', 'Photo' => 'sreyneang.jpg',
        ]);

        $b1 = Book::create([
            'BookTitle' => 'Stories of Angkor', 'BookTypeID' => $novel->BookTypeID,
            'PublishDate' => '2015-05-01', 'NumOfPages' => 320, 'NumOfCopies' => 15,
            'Edition' => '1st', 'Publisher' => 'Angkor Press', 'BookSource' => 'Library', 'Remark' => 'Popular',
        ]);
        $b2 = Book::create([
            'BookTitle' => 'Introduction to Physics', 'BookTypeID' => $science->BookTypeID,
            'PublishDate' => '2018-09-10', 'NumOfPages' => 450, 'NumOfCopies' => 8,
            'Edition' => '2nd', 'Publisher' => 'Science House', 'BookSource' => 'Donation', 'Remark' => null,
        ]);
        $b3 = Book::create([
            'BookTitle' => 'Learning Laravel', 'BookTypeID' => $tech->BookTypeID,
            'PublishDate' => '2023-01-15', 'NumOfPages' => 280, 'NumOfCopies' => 20,
            'Edition' => '1st', 'Publisher' => 'Tech Books', 'BookSource' => 'Purchase', 'Remark' => 'New',
        ]);

        BookAuthor::create(['BookID' => $b1->BookID, 'AuthorID' => $a1->AuthorID, 'AuthorDate' => '2015-01-01', 'Remark' => 'Main author']);
        BookAuthor::create(['BookID' => $b2->BookID, 'AuthorID' => $a2->AuthorID, 'AuthorDate' => '2018-01-01', 'Remark' => null]);
        BookAuthor::create(['BookID' => $b3->BookID, 'AuthorID' => $a1->AuthorID, 'AuthorDate' => '2022-06-01', 'Remark' => 'Co-author']);
        BookAuthor::create(['BookID' => $b3->BookID, 'AuthorID' => $a2->AuthorID, 'AuthorDate' => '2022-06-01', 'Remark' => 'Co-author']);
    }
}
