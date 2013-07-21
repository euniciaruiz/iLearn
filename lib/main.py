import pygame, sys
from title_screen import TitleScreen
from game import Game

class Main:
    def __init__(self):
        pygame.init()
        self.mode = (700,500)
        self.screen = pygame.display.set_mode(self.mode)
        self.unit = int(self.mode[1]/53)
        pygame.mouse.set_visible(False)
        pygame.display.set_caption("Interactive Learning Game")

    def main(self):
        while True:
            if not self.title_screen(): break
            self.play_game()

    def title_screen(self):
        ts = TitleScreen(self.screen, self.unit)
        ts.main()
        return ts.running

    def play_game(self):
        gm = Game(self.screen, self.unit)
        gm.main()
        return gm.running


def main():
    game = Main()
    game.main()
    pygame.quit()
    sys.exit()


if __name__ == "__main__":
    main()
