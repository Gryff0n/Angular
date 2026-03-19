import { Component, OnInit, ChangeDetectorRef } from '@angular/core';
import { RouterLink } from '@angular/router';
import { MatCardModule } from '@angular/material/card';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { BookService } from '../../services/book.service';
import { Book } from '../../entity/book';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-book-list',
  imports: [RouterLink, MatCardModule, MatButtonModule, MatIconModule, DatePipe],
  templateUrl: './book-list.html',
  styleUrl: './book-list.scss'
})
export class BookList implements OnInit {
  books: Book[] = [];

  constructor(private bookService: BookService, private cdr: ChangeDetectorRef) {}

  ngOnInit(): void {
    this.bookService.getAll().subscribe({
      next: (data: any) => {
        this.books = [...data['member']];
        this.cdr.detectChanges();
      },
      error: (err) => console.error(err)
    });
  }

  delete(id: number): void {
    if (confirm('Supprimer ce livre ?')) {
      this.bookService.delete(id).subscribe(() => {
        this.books = this.books.filter(b => b.id !== id);
        this.cdr.detectChanges();
      });
    }
  }
}