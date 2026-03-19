import { Component } from '@angular/core';
import { RouterLink } from '@angular/router';
import { MatButtonModule } from '@angular/material/button';

@Component({
  selector: 'app-menu',
  imports: [RouterLink, MatButtonModule],
  templateUrl: './menu.html',
  styleUrl: './menu.scss'
})
export class Menu {}