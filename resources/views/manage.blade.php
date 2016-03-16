@extends('default')

@section('content')
	<div class="column">
		<div class="ui breadcrumb">
			<a href="{{ route('imexport') }}" class="section">Import/Export</a>
			<i class="right chevron icon"></i>
			<div class="section">Manage</div>
		</div>
		<div class="ui padded raised segment">
			<table class="ui basic striped padded table form">
				<thead>
					<tr>
						<th>Name</th>
						<th>Device</th>
						<th>Interested Course(s)</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<i class="male icon"></i>
							Cheong Chee Keong
						</td>
						<td>
							John's Tablet
						</td>
						<td>
							<div class="ui bulleted list">
								<div class="item">
									Bachelor of Commerce in Banking
								</div>
								<div class="item">
									Bachelor of Economics
								</div>
							</div>
						</td>
						<td class="right aligned field">
							<div class="ui empty toggle checkbox">
								<input type="checkbox" checked>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<i class="female icon"></i>
							Lim Sin Yun
						</td>
						<td>
							John's Tablet
						</td>
						<td>
							<div class="ui bulleted list">
								<div class="item">
									Bachelor of Commerce in Management
								</div>
								<div class="item">
									Bachelor of Commerce in International Business
								</div>
								<div class="item">
									Master of Human Resource Management
								</div>
							</div>
						</td>
						<td class="right aligned field">
							<div class="ui empty toggle checkbox">
								<input type="checkbox" checked>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<i class="female icon"></i>
							Lim Sin Yun
						</td>
						<td>
							John's Tablet
						</td>
						<td>
							<div class="ui bulleted list">
								<div class="item">
									Bachelor of Commerce in Management
								</div>
								<div class="item">
									Bachelor of Commerce in International Business
								</div>
								<div class="item">
									Master of Human Resource Management
								</div>
							</div>
						</td>
						<td class="right aligned field">
							<div class="ui empty toggle checkbox">
								<input type="checkbox" checked>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<i class="female icon"></i>
							Lim Sin Yun
						</td>
						<td>
							John's Tablet
						</td>
						<td>
							<div class="ui bulleted list">
								<div class="item">
									Bachelor of Commerce in Management
								</div>
								<div class="item">
									Bachelor of Commerce in International Business
								</div>
								<div class="item">
									Master of Human Resource Management
								</div>
							</div>
						</td>
						<td class="right aligned field">
							<div class="ui empty toggle checkbox">
								<input type="checkbox" checked>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<i class="female icon"></i>
							Lim Sin Yun
						</td>
						<td>
							John's Tablet
						</td>
						<td>
							<div class="ui bulleted list">
								<div class="item">
									Bachelor of Commerce in Management
								</div>
								<div class="item">
									Bachelor of Commerce in International Business
								</div>
								<div class="item">
									Master of Human Resource Management
								</div>
							</div>
						</td>
						<td class="right aligned field">
							<div class="ui empty toggle checkbox">
								<input type="checkbox" checked>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@stop