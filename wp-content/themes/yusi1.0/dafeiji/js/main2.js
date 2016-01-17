(function () {
    function j(c) {
        if ("undefined" != typeof d[c])return d[c];
        d[c] = new Image;
        d[c].src = c;
        return d[c]
    }

    function r() {
        var c = 0, d = setInterval(function () {
            var h = j("bg.jpg");
            i.drawImage(h, 0, 0, h.width, h.height);
            var h = j("logo.png"), d = h.width, f = h.height, k = ($(e).width() - d) / 2;
            i.drawImage(h, k, 100, d, f);
            600 == c && (c = 0);
            h = j("loading" + (parseInt(c / 200) + 1) + ".png");
            d = h.width;
            f = h.height;
            k = ($(e).width() - d) / 2;
            i.drawImage(h, k, 220, d, f);
            c++
        }, 1);
        m("cartridge.png die1.png die2.png me.png plain1.png plain2.png plain3.png plain1_die1.png plain1_die2.png plain1_die3.png plain2_die1.png plain2_die2.png plain2_die3.png plain2_die4.png plain3_die1.png plain3_die2.png plain3_die3.png plain3_die4.png plain3_die5.png plain3_die6.png me_die1.png me_die2.png me_die3.png me_die4.png".split(" "),
            function () {
                var c = function (g) {
                    this.type = g;
                    this.hp;
                    this.height;
                    this.width;
                    this.maxSpeed;
                    this.dieTime;
                    this.status = true;
                    switch (g) {
                        case 1:
                            this.hp = 1;
                            this.score = 1E3;
                            this.modelimg = "plain1.png";
                            this.maxSpeed = 5;
                            this.dieTime = 75;
                            break;
                        case 2:
                            this.hp = 6;
                            this.score = 8E3;
                            this.modelimg = "plain2.png";
                            this.maxSpeed = 2;
                            this.dieTime = 100;
                            break;
                        case 3:
                            this.hp = 15;
                            this.score = 3E4;
                            this.modelimg = "plain3.png";
                            this.maxSpeed = 1.5;
                            this.dieTime = 150
                    }
                    this.model = j(this.modelimg);
                    this.width = n / 480 * this.model.width;
                    this.height = this.width /
                        this.model.width * this.model.height;
                    this.x = Math.random() * (n - this.width);
                    this.y = -this.height;
                    g = a.time > 10 ? 10 : a.time;
                    this.speed = Math.random() * (g - 1) + 1;
                    this.speed = this.speed < 0.5 ? Math.random() * 0.5 + 0.5 : this.speed;
                    this.speed = this.speed > this.maxSpeed ? this.maxSpeed : this.speed;
                    this.die = function () {
                        var g = this.type, b = this.x, c = this.y, e = this.width, d = this.height;
                        a.plainsDies.push(new function (a) {
                            this.animationTime = a;
                            this.call = function () {
                                if (!(this.animationTime <= 0)) {
                                    var f = j("plain" + g + "_die" + (parseInt((a - this.animationTime) /
                                        25) + 1) + ".png");
                                    i.drawImage(f, b, c, e, d);
                                    this.animationTime--
                                }
                            }
                        }(this.dieTime))
                    };
                    this.byAttack = function () {
                        this.hp--;
                        if (this.hp <= 0) {
                            a.score = a.score + this.score;
                            this.status = false;
                            this.die()
                        }
                    }
                }, o = {show:function (a) {
                    $("#modal").find(".content").html(a);
                    $("#modal").removeClass("hide")
                }, hide:function () {
                    $("#modal").addClass("hide")
                }}, f = j("bg.jpg"), k = f.width, l = f.height;
                i.drawImage(f, 0, 0, k, l);
                var n = $(e).width(), m = $(e).height(), b = {status:true};
                b.model = j("me.png");
                b.width = n / 480 * b.model.width;
                b.height = b.width / b.model.width *
                    b.model.height;
                b.move = function (a, c) {
                    b.x = a - b.width / 2;
                    b.y = c - b.height / 2;
                    var p = $(e).width(), d = $(e).height();
                    b.x = b.x > p - b.width ? p - b.width : b.x;
                    b.x = b.x < 0 ? 0 : b.x;
                    b.y = b.y > d - b.height ? d - b.height : b.y
                };
                b.moveing = function () {
                    b.status && i.drawImage(b.model, b.x, b.y, b.width, b.height)
                };
                b.cartridges = [];
                b.cartridge = function (a, b) {
                    var c = j("cartridge.png");
                    this.model = c;
                    this.x = a;
                    this.y = b;
                    this.width = n / 480 * c.width;
                    this.height = this.width / c.width * c.height
                };
                b.attackTime = 0;
                b.attack = function () {
                    if (b.status) {
                        b.attackTime++;
                        if (b.attackTime %
                            20 == 0) {
                            b.attackTime = 0;
                            var a = new b.cartridge(0, 0);
                            a.x = b.x + (b.width - a.width) / 2;
                            a.y = b.y - a.height;
                            b.cartridges.push(a)
                        }
                    }
                };
                b.attacking = function () {
                    b.attack();
                    b.cartridges.map(function (g, c) {
                        i.drawImage(g.model, g.x, g.y, g.width, g.height);
                        g.y <= 0 && b.cartridges.splice(c, 1);
                        a.plains.map(function (a) {
                            var d = g.x, e = g.y - 10;
                            if (d > a.x && d < a.x + a.width && e < a.y + a.height + a.speed && g.y >= a.y + a.height) {
                                b.cartridges.splice(c, 1);
                                a.byAttack()
                            }
                        });
                        g.y = g.y - 10
                    })
                };
                b.die = function () {
                    function g() {
                        var b = 4 * c;
                        this.animationTime = 4 * c;
                        this.call =
                            function () {
                                this.animationTime == 1 && a.over();
                                var g = j("me_die" + (parseInt((b - this.animationTime) / c) + 1) + ".png");
                                i.drawImage(g, d, f, k, h);
                                this.animationTime--
                            }
                    }

                    if (b.status) {
                        $(e).off("mousemove");
                        e.removeEventListener("touchmove");
                        b.status = false;
                        var c = 25, d = this.x, f = this.y, h = this.height, k = this.width;
                        a.plainsDies.push(new g)
                    }
                };
                var a = {score:0};
                a.me = b;
                a.time = 0;
                a.refresh = function () {
                    a.time = a.time + 0.001;
                    a.bgScroll();
                    a.addPlain();
                    a.plainsScroll();
                    a.me.moveing();
                    a.me.attacking();
                    a.plainsDying();
                    $("#score").html(a.score)
                };
                a.bgScrollTime = 0;
                a.bgScroll = function () {
                    a.bgScrollTime = a.bgScrollTime + 0.5;
                    if (a.bgScrollTime > l)a.bgScrollTime = 0;
                    i.drawImage(f, 0, a.bgScrollTime - l, k, l);
                    i.drawImage(f, 0, a.bgScrollTime, k, l)
                };
                a.plains = [];
                a.plainsNum = 0;
                a.addPlain = function () {
                    if (a.bgScrollTime % 60 == 0) {
                        if (a.plainsNum == 25)a.plainsNum = 0;
                        a.plainsNum++;
                        switch (true) {
                            case a.plainsNum % 13 == 0:
                                a.plains.push(new c(3, 0.3));
                                break;
                            case a.plainsNum % 6 == 0:
                                a.plains.push(new c(2, 0.3));
                                break;
                            default:
                                a.plains.push(new c(1, 0.3))
                        }
                    }
                };
                a.plainsScroll = function () {
                    a.plains.map(function (b, c) {
                        if (b.status) {
                            i.drawImage(b.model, b.x, b.y, b.width, b.height);
                            var d = [b.x, b.y], e = [b.x + b.width, b.y + b.height], f = [a.me.x + a.me.width / 3, a.me.y], h = [a.me.x + a.me.width * 2 / 3, a.me.y + a.me.height * 2 / 3], d = [Math.max(d[0], f[0]), Math.max(d[1], f[1])], e = [Math.min(e[0], h[0]), Math.min(e[1], h[1])];
                            d[0] < e[0] && d[1] < e[1] && a.me.die();
                            b.y > m && a.plains.splice(c, 1);
                            b.y = b.y + b.speed
                        } else a.plains.splice(c, 1)
                    })
                };
                a.plainsDies = [];
                a.plainsDying = function () {
                    a.plainsDies.map(function (b, c) {
                        b.animationTime == 0 ? a.plainsDies.splice(c, 1) : b.call()
                    })
                };
                a.over = function () {
                    $(e).removeClass("playing");
                    clearInterval(a.clock);
                    o.show(a.score)
                };
                a.clear = function () {
                    a.me.x = ($(e).width() - a.me.width) / 2;
                    a.me.y = $(e).height() - a.me.height;
                    a.plains = [];
                    a.plainsDies = [];
                    a.plainsNum = 0;
                    a.time = 0;
                    a.bgScrollTime = 0;
                    a.score = 0;
                    a.me.status = true
                };
                a.start = function () {
                    $(e).addClass("playing");
                    $(e).on("mousemove", function (a) {
                        var c = a.clientX - $(this).offset().left;
                        b.move(c, a.clientY)
                    });
                    e.addEventListener("touchmove", function (a) {
                        a.preventDefault();
                        a = a.targetTouches[0];
                        b.move(a.pageX,
                            a.pageY)
                    });
                    o.hide();
                    a.clear();
                    a.clock = setInterval(function () {
                        a.refresh()
                    }, 7)
                };
                a.start();
                $("#modal").on("click", "button", function () {
                    a.start()
                });
                clearInterval(d)
            })
    }

    function m(c, e) {
        var h = 0, i = c.length, f;
        for (f in c)d[c[f]] = new Image, d[c[f]].src = s + c[f], d[c[f]].onload = function () {
            h++;
            h >= i && e()
        }
    }

    var s = "http://sandbox.runjs.cn/uploads/rs/30/7mnuxrh7/", e = $("#game-box").get(0), q = function () {
        $(e).attr("height", 800 > $(window).height() ? $(window).height() : 800);
        $(e).attr("width", 480 > $(window).width() ? $(window).width() :
            480)
    };
    $(window).on("resize", q);
    q();
    var i = e.getContext("2d"), d = [];
    $(function () {
        m(["bg.jpg", "loading1.png", "loading2.png", "loading3.png", "logo.png"], r)
    })
})();
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 15-11-26
 * Time: 下午12:23
 * To change this template use File | Settings | File Templates.
 */
