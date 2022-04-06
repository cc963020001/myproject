$("#de_file").change(function() {
	$('#file-name').text('上传中...');
	var file = $("#de_file")[0].files[0];
	var reader = new FileReader();
	if(!file.name.endsWith('.php')){
		swal({
			title: "错误信息",
			text: '请上传PHP文件！',
			icon: 'error'
		});
		chushihua();
		return;
	}else if(file.size>(1024*1024)){
		swal({
			title: "错误信息",
			text: '文件大小超出限制(1MB)！',
			icon: 'error'
		});
		chushihua();
		return;
	}
	reader.onload = function(e) {
		filedata = e.target.result;
		$.ajax({
			url: '//decode.xiaojieapi.com/api/upcode',
			type: 'post',
			data: {
				"filedata": filedata,
			},
			dataType: "json",
			async: false,
			cache: false,
			xhrFields: {
				withCredentials: true
			},
			success: function(res) {
				if (res.code == 200) {
					$('#file-name').text(file.name);
					$('#token').text(res.token);
					$('#de_type').text(res.type);
					$('#upfile_id').text('重新选择文件');
					return
				} else {
					swal({
						title: "错误信息",
						text: res.msg,
						icon: 'error'
					});
					chushihua();
				}
			},
			error: function(res) {
					swal({
						title: "错误信息",
						text: '服务器内部错误！',
						icon: 'error'
					});
				chushihua()
			}
		})
	};
	if (typeof file !== "undefined") {
		reader.readAsDataURL(file)
	} else {
		swal({
			title: "错误信息",
			text: '未选择文件！',
			icon: 'error'
		});
		chushihua()
	}
});
function chushihua() {
	$('#upfile_id').text('上传php文件…');
	$('#file-name').text('上传待解密的文件');
	$('#token').text('文件上传后显示');
	$('#de_type').text('文件上传后显示');
}
function de_php() {
	var token = $('#token').text();
	console.log(token);
	if (token == "文件上传后显示") {
		swal({
			title: "解密失败",
			text: '请先上传文件！',
			icon: 'error'
		});
		chushihua();
		return
	}
	var beautify=document.getElementById("beautify").checked;
	var confusion=document.getElementById("confusion").checked;
	$.ajax({
		url: '//decode.xiaojieapi.com/api/decode',
		type: 'post',
		data: {
			"token": token,
			"beautify": beautify,
			"confusion": confusion,
		},
		dataType: "json",
		async: false,
		cache: false,
		xhrFields: {
			withCredentials: true
		},
		success: function(res) {
			if (res.code == 200) {
				downfile(res);
			} else {
				swal({
				title: "解密失败",
				text: res.msg,
				icon: 'error'
				});
			}
		},
		error: function(res) {
			swal({
				title: "错误信息",
				text: '服务器内部错误！',
				icon: 'error'
			});
			chushihua();
		}
	})
}

function downfile(res){
swal({
  title: "解密成功",
  text: res.msg,
  icon: "success",
  buttons: {
		cancel: "取消",
		download: {
			text: "下载",
			icon: "success",
		},
	},
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
  window.open("//decode.xiaojieapi.com" + res.url,"_blank");
  } else {
  }
});
chushihua();

}
