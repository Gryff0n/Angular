import { Component, OnInit, ChangeDetectorRef } from '@angular/core';
import { ActivatedRoute, Router, RouterLink } from '@angular/router';
import { MatCardModule } from '@angular/material/card';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { BookService } from '../../services/book.service';
import { Book } from '../../entity/book';
import { DatePipe } from '@angular/common';

@Component({
  selector: 'app-book-detail',
  imports: [RouterLink, MatCardModule, MatButtonModule, MatIconModule, DatePipe],
  templateUrl: './book-detail.html',
  styleUrl: './book-detail.scss'
})
export class BookDetail implements OnInit {
  book?: Book;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private bookService: BookService,
    private cdr: ChangeDetectorRef
  ) {}

  ngOnInit(): void {
    const id = Number(this.route.snapshot.paramMap.get('id'));
    this.bookService.getById(id).subscribe({
      next: (data: any) => {
        this.book = data;
        this.cdr.detectChanges();
      },
      error: (err) => console.error(err)
    });
  }

  delete(): void {
    if (confirm('Supprimer ce livre ?')) {
      this.bookService.delete(this.book!.id!).subscribe(() => {
        this.router.navigate(['/books']);
      });
    }
  }
}