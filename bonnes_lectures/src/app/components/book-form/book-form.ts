import { Component, OnInit, ChangeDetectorRef } from '@angular/core';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { MatCardModule } from '@angular/material/card';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { MatInputModule } from '@angular/material/input';
import { MatFormFieldModule } from '@angular/material/form-field';
import { BookService } from '../../services/book.service';
import { Book } from '../../entity/book';

@Component({
  selector: 'app-book-form',
  imports: [FormsModule, RouterLink, MatCardModule, MatButtonModule, MatIconModule, MatInputModule, MatFormFieldModule],
  templateUrl: './book-form.html',
  styleUrl: './book-form.scss'
})
export class BookForm implements OnInit {
  book: Book = {
    title: '',
    publisher: '',
    year: new Date(),
    backcover: '',
    isbn: 0
  };
  isEdit = false;
  id?: number;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private bookService: BookService,
    private cdr: ChangeDetectorRef
  ) {}

  ngOnInit(): void {
    this.id = Number(this.route.snapshot.paramMap.get('id'));
    if (this.id) {
      this.isEdit = true;
      this.bookService.getById(this.id).subscribe({
        next: (data: any) => {
          this.book = data;
          this.book.year = new Date(data.year).getFullYear() as any;
          this.cdr.detectChanges();
        },
        error: (err) => console.error(err)
      });
    }
  }
  submit(): void {
    const bookToSend = {
      ...this.book,
      isbn: Number(this.book.isbn),
      year: new Date(`${this.book.year}-01-01`)
    };

    if (this.isEdit) {
      this.bookService.update(this.id!, bookToSend).subscribe(() => {
        this.router.navigate(['/books', this.id]);
      });
    } else {
      this.bookService.create(bookToSend).subscribe(() => {
        this.router.navigate(['/books']);
      });
    }
  }
}