import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Book } from '../entity/book';

@Injectable({
  providedIn: 'root'
})
export class BookService {

  private apiUrl = 'http://localhost:8010/api/books';

  constructor(private http: HttpClient) {}

  getAll(): Observable<any> {
    return this.http.get<any>(this.apiUrl, {
      headers: { 'Accept': 'application/ld+json' }
    });
  }

  getById(id: number): Observable<Book> {
    return this.http.get<Book>(`${this.apiUrl}/${id}`, {
      headers: { 'Accept': 'application/ld+json' }
    });
  }

  create(book: Book): Observable<Book> {
    return this.http.post<Book>(this.apiUrl, book, {
      headers: { 'Content-Type': 'application/ld+json' }
    });
  }

  update(id: number, book: Book): Observable<Book> {
    return this.http.patch<Book>(`${this.apiUrl}/${id}`, book, {
      headers: { 'Content-Type': 'application/merge-patch+json' }
    });
  }

  delete(id: number): Observable<void> {
    return this.http.delete<void>(`${this.apiUrl}/${id}`);
  }
}